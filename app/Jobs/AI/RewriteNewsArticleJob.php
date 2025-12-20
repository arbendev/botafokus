<?php
namespace App\Jobs\AI;

use App\Models\AiJobLog;
use App\Models\Article;
use App\Models\RawArticle;
use App\Models\Tag;
use App\Services\AI\NewsAiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Throwable;

class RewriteNewsArticleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 180;

    public function __construct(
        public int $rawArticleId,
        public string $outletName,
        public string $targetLanguage,
        public ?int $aiJobLogId = null
    ) {}

    public function handle(NewsAiService $ai): void
    {
        $log = $this->aiJobLogId ? AiJobLog::find($this->aiJobLogId) : null;

        if ($log) {
            $log->update([
                'status'     => 'running',
                'started_at' => now(),
            ]);
        }

        $raw = RawArticle::findOrFail($this->rawArticleId);

        $payload = [
            'outlet_name'         => $this->outletName,
            'target_language'     => $this->targetLanguage,
            'source_title'        => $raw->source_title,
            'source_url'          => $raw->source_url,
            'source_published_at' => optional($raw->source_published_at)->toIso8601String(),
            'source_content'      => $raw->source_content,

            // optional fields for prompt compatibility, if you later add them
            'source_type'         => $raw->source_type,
            'source_name'         => $raw->source_name,
        ];

        try {
            if ($log) {
                $log->update([
                    'payload' => json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                ]);
            }

            $aiResult = $ai->rewriteAndTranslate($payload);

            $article = Article::create([
                'raw_article_id'  => $raw->id,
                'status'          => 'ai_draft',
                'slug'            => $this->uniqueSlugFromTitle($aiResult['title']),
                'title'           => $aiResult['title'],
                'lead'            => $aiResult['lead'],
                'body'            => $aiResult['body'],
                'location_label'  => $aiResult['location_label'],
                'seo_title'       => $aiResult['seo_title'],
                'seo_description' => $aiResult['seo_description'],
            ]);

            $tagIds = collect($aiResult['tags'])->map(function ($name) {
                $name = trim((string) $name);
                if ($name === '') {
                    return null;
                }

                return Tag::firstOrCreate(
                    ['slug' => Str::slug($name)],
                    ['name' => $name]
                )->id;
            })->filter()->values();

            $article->tags()->sync($tagIds->all());

            if ($log) {
                $log->update([
                    'article_id'  => $article->id,
                    'status'      => 'success',
                    'message'     => 'AI rewrite completed and saved as draft.',
                    'result'      => json_encode($aiResult, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                    'finished_at' => now(),
                ]);
            }
        } catch (Throwable $e) {
            if ($log) {
                $log->update([
                    'status'      => 'failed',
                    'message'     => 'AI rewrite failed.',
                    'error'       => $e->getMessage(),
                    'finished_at' => now(),
                ]);
            }

            // Re-throw so the queue can record the failure + retry based on your config
            throw $e;
        }
    }

    private function uniqueSlugFromTitle(string $title): string
    {
        $base = Str::slug($title);
        if ($base === '') {
            $base = 'article';
        }

        $slug = $base;
        $i    = 2;

        while (Article::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }
}
