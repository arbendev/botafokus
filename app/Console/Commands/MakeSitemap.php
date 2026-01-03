<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class MakeSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.xml file for the public website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        $sitemap = Sitemap::create();

        // 1. Static Pages
        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY));
        $sitemap->add(Url::create('/videos')->setPriority(0.8));
        $sitemap->add(Url::create('/categories')->setPriority(0.8));

        // 2. Categories
        $categories = Category::where('active', true)->get();
        foreach ($categories as $category) {
            $sitemap->add(
                Url::create(route('categories.show', $category->slug))
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setLastModificationDate($category->updated_at)
            );
        }

        // 3. Articles (Published only)
        Article::where('status', 'published')
            ->orderByDesc('published_at')
            ->chunk(100, function ($articles) use ($sitemap) {
                foreach ($articles as $article) {
                    $sitemap->add(
                        Url::create(route('articles.show', $article->slug))
                            ->setPriority(0.7)
                            ->setLastModificationDate($article->updated_at)
                    );
                }
            });

        $path = public_path('sitemap.xml');
        $sitemap->writeToFile($path);

        $this->info("Sitemap generated successfully at: {$path}");
    }
}
