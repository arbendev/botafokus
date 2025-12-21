<?php
namespace App\Jobs\Ingestion;

use App\Jobs\AI\RewriteNewsArticleJob;
use App\Models\AiJobLog;
use App\Models\RawArticle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
use Throwable;

class FetchSourceArticleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 120;

    public function __construct(
        public int $rawArticleId,
        public int $aiJobLogId,
        public string $outletName,
        public string $targetLanguage,
    ) {}

    public function handle(): void
    {
        $raw = RawArticle::findOrFail($this->rawArticleId);
        $log = AiJobLog::find($this->aiJobLogId);

        if ($log) {
            $log->update([
                'status'     => 'running',
                'started_at' => now(),
                'message'    => 'Fetching source URL...',
            ]);
        }

        try {
            $response = Http::timeout(20)
                ->withHeaders([
                    'User-Agent' => 'BotaFokusBot/1.0 (+news ingestion)',
                    'Accept'     => 'text/html,application/xhtml+xml',
                ])
                ->get($raw->source_url);

            if (! $response->successful()) {
                throw new \RuntimeException('Fetch failed with HTTP ' . $response->status());
            }

            $html = $response->body();

            [$title, $content] = $this->extractTitleAndContent($html);

            $content = trim($content);
            $title   = trim($title);

            if (mb_strlen($content) < 400) {
                throw new \RuntimeException('Extraction failed (content too short).');
            }

            $hash = hash('sha256', $content);

            // Dedup: if same content already exists elsewhere, stop
            $dup = RawArticle::where('content_hash', $hash)
                ->where('id', '!=', $raw->id)
                ->exists();

            if ($dup) {
                if ($log) {
                    $log->update([
                        'status'      => 'failed',
                        'message'     => 'Duplicate detected (content hash already exists).',
                        'finished_at' => now(),
                    ]);
                }
                // Optional: delete placeholder raw record
                $raw->delete();
                return;
            }

            $raw->update([
                'source_title'   => $title !== '' ? $title : $raw->source_title,
                'source_content' => $content,
                'content_hash'   => $hash,
            ]);

            if ($log) {
                $log->update([
                    'message' => 'Fetched + extracted. Queuing AI rewrite...',
                ]);
            }

            // ✅ THIS IS THE KEY: we rely on your existing AI job signature
            RewriteNewsArticleJob::dispatch(
                rawArticleId: $raw->id,
                outletName: $this->outletName,
                targetLanguage: $this->targetLanguage,
                aiJobLogId: $this->aiJobLogId
            );

            // Do NOT mark success here; Rewrite job will mark final success/failure
        } catch (Throwable $e) {
            if ($log) {
                $log->update([
                    'status'      => 'failed',
                    'message'     => 'Fetch/extraction failed.',
                    'error'       => $e->getMessage(),
                    'finished_at' => now(),
                ]);
            }
            throw $e;
        }
    }

    /**
     * Extraction strategy:
     * 1) <article> paragraphs
     * 2) <main> paragraphs
     * 3) fallback to all <p> with filtering
     *
     * @return array{0:string,1:string}
     */
    private function extractTitleAndContent(string $html): array
    {
        $crawler = new Crawler($html);

        $title = '';
        if ($crawler->filter('meta[property="og:title"]')->count()) {
            $title = (string) $crawler->filter('meta[property="og:title"]')->attr('content');
        } elseif ($crawler->filter('title')->count()) {
            $title = $crawler->filter('title')->text('');
        } elseif ($crawler->filter('h1')->count()) {
            $title = $crawler->filter('h1')->first()->text('');
        }

        $textFrom = function (Crawler $scope): string {
            $paras = $scope->filter('p')->each(fn($n) => trim($n->text('')));
            $paras = array_values(array_filter($paras, fn($p) => mb_strlen($p) >= 40));
            return implode("\n\n", $paras);
        };

        // Prefer article
        if ($crawler->filter('article')->count()) {
            $content = $textFrom($crawler->filter('article')->first());
            if (mb_strlen($content) >= 400) {
                return [$title, $content];
            }
        }

        // Then main
        if ($crawler->filter('main')->count()) {
            $content = $textFrom($crawler->filter('main')->first());
            if (mb_strlen($content) >= 400) {
                return [$title, $content];
            }
        }

        // Fallback: all paragraphs, filtered
        $paras   = $crawler->filter('p')->each(fn($n) => trim($n->text('')));
        $paras   = array_values(array_filter($paras, fn($p) => mb_strlen($p) >= 40));
        $content = implode("\n\n", $paras);

        return [$title, $content];
    }
}
