<?php
namespace App\Jobs\AI;

use App\Services\AI\NewsAiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class RewriteNewsArticleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 120;

    /**
     * @param  array<string, mixed>  $sourceData
     */
    public function __construct(
        protected array $sourceData
    ) {}

    public function handle(NewsAiService $ai): void
    {
        Log::info('Starting AI rewrite job', [
            'source_title' => $this->sourceData['source_title'] ?? null,
        ]);

        $result = $ai->rewriteAndTranslate($this->sourceData);

        /**
         * IMPORTANT:
         * We are NOT saving to the database yet.
         * That comes in the next step when we introduce:
         * - raw_articles
         * - articles
         * - editorial statuses
         */

        Log::info('AI rewrite completed', [
            'title' => $result['title'],
            'tags'  => $result['tags'],
        ]);

        // For now, just dump into logs so we can test safely
        Log::debug('AI article payload', $result);
    }
}
