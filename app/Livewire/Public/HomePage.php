<?php
namespace App\Livewire\Public;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $categories = Category::where('active', true)
            ->orderBy('order_index')
            ->get();

        // Hero: featured or latest published
        $hero = Article::where('status', 'published')
            ->where('is_featured', true)
            ->orderByDesc('published_at')
            ->first();

        if (! $hero) {
            $hero = Article::where('status', 'published')
                ->orderByDesc('published_at')
                ->first();
        }

        // Top stories: latest excluding hero
        $topStories = Article::where('status', 'published')
            ->when($hero, fn($q) => $q->where('id', '!=', $hero->id))
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        // Latest ticker
        $latestTicker = Article::where('status', 'published')
            ->orderByDesc('published_at')
            ->limit(5)
            ->get();

        // Helper to get excluded IDs so we don't repeat articles in sections
        $excludedIds = collect([]);
        if ($hero) $excludedIds->push($hero->id);
        // We will NOT exclude top stories from the sections below, 
        // because with low content volume, this causes categories to disappear entirely.
        // $excludedIds = $excludedIds->merge($topStories->pluck('id'));

        // Defined Section Layouts matched to welcome.blade.php
        $layoutMap = [
            'bote' => 'grid-4',           // 4 items
            'politike' => 'politics-3',   // 2 featured + list
            'lufte-konflikte' => 'conflict-4', // 4 vertical items
            'ekonomi-jetese' => 'economy-2',   // 1 big + list
            'migrim-diaspora' => 'migration-3', // 3 cols (1 card, 1 card, 1 list)
            'teknologji-siguri' => 'tech-3',   // 3 cols (1 card, 1 card, 1 list-half-width actually)
            'shendet-shkence' => 'health-3',   // 3 cols (1 card, 1 card, 1 list)
            'kulture-shoqeri' => 'culture-3',  // 3 cols similar to tech
        ];

        $sections = collect();

        foreach ($layoutMap as $slug => $layout) {
            $cat = Category::where('slug', $slug)->first();
            if (! $cat) continue;

            $limit = match ($layout) {
                'grid-4', 'conflict-4' => 4,
                'politics-3', 'migration-3', 'tech-3', 'health-3', 'culture-3' => 5, // Reserve enough for list items
                'economy-2' => 4,
                default => 4
            };

            // Fetch latest articles for this category WITHOUT exclusion
            $articles = Article::where('status', 'published')
                ->where('category_id', $cat->id)
                ->orderByDesc('published_at')
                ->limit($limit)
                ->get();

            $sections->push([
                'category' => $cat,
                'articles' => $articles,
                'layout' => $layout
            ]);
        }

        // Videos (Mock or Real)
        // Check if Video model exists, otherwise use empty or mock
        $videos = collect([]);
        if (class_exists(\App\Models\Video::class)) {
             $videos = \App\Models\Video::orderByDesc('published_at')->limit(5)->get();
        }

        // SEO Data
        $seo = [
            'title' => "Bota Fokus - Lajme, Analiza dhe Kontekst Global",
            'description' => "Platformë lajmesh dhe analizash globale në gjuhën shqipe, me fokus tek saktësia, konteksti dhe verifikimi i fakteve.",
            'image' => asset('/bota-focus-og.jpg'),
            'url' => url('/'),
        ];

        return view('livewire.public.home-page', compact('hero', 'topStories', 'sections', 'latestTicker', 'seo', 'videos'))
            ->layout('layouts.app');
    }
}
