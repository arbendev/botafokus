<?php
namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class PublishScheduledArticles extends Command
{
    protected $signature   = 'articles:publish-scheduled';
    protected $description = 'Publish scheduled articles whose publish_at time has arrived';

    public function handle(): int
    {
        $count = Article::where('status', 'published')
            ->whereNotNull('publish_at')
            ->where('publish_at', '<=', now())
            ->whereNull('published_at')
            ->update([
                'published_at' => now(),
            ]);

        $this->info("Published {$count} scheduled articles.");

        return self::SUCCESS;
    }
}
