<?php
namespace App\Jobs\AI;

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

class RewriteNewsArticleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 120;

    public function __construct(
        protected array $sourceData
    ) {}

    public function handle(NewsAiService $ai): void
    {
        // 1. Store raw article
        $raw = RawArticle::firstOrCreate(
            ['source_url' => $this->sourceData['source_url']],
            [
                'source_type'         => $this->sourceData['source_type'] ?? 'unknown',
                'source_name'         => $this->sourceData['source_name'] ?? null,
                'source_title'        => $this->sourceData['source_title'],
                'source_content'      => $this->sourceData['source_content'],
                'source_published_at' => $this->sourceData['source_published_at'] ?? null,
                'content_hash'        => sha1($this->sourceData['source_content']),
            ]
        );

        // 2. Run AI
        $aiResult = $ai->rewriteAndTranslate($this->sourceData);

        // 3. Create article draft
        $article = Article::create([
            'raw_article_id'  => $raw->id,
            'status'          => 'ai_draft',
            'slug'            => Str::slug($aiResult['title']) . '-' . Str::random(6),
            'title'           => $aiResult['title'],
            'lead'            => $aiResult['lead'],
            'body'            => $aiResult['body'],
            'location_label'  => $aiResult['location_label'],
            'seo_title'       => $aiResult['seo_title'],
            'seo_description' => $aiResult['seo_description'],
        ]);

        // 4. Tags
        $tagIds = collect($aiResult['tags'])->map(function ($name) {
            return Tag::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            )->id;
        });

        $article->tags()->sync($tagIds);
    }
}
