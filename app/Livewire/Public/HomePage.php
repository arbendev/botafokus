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
        $excludedIds = $excludedIds->merge($topStories->pluck('id'));

        // Section blocks (each category => articles)
        // We will cycle through 4 layout types:
        // 0: 'grid' (4 cards row)
        // 1: 'politics' (3 cols: 2 cards + 1 list)
        // 2: 'conflict' (4 cols: small vertical cards)
        // 3: 'economy' (2 cols: 1 huge + 1 list)
        $sections = $categories->map(function ($cat, $index) use ($excludedIds) {
            $layoutTypes = ['grid', 'politics', 'conflict', 'economy'];
            $layout = $layoutTypes[$index % 4];

            // Decide limit based on layout
            $limit = match ($layout) {
                'grid' => 4,
                'politics' => 5, // 2 cards + 3 list items
                'conflict' => 4,
                'economy' => 4, // 1 large + 3 list items
                default => 4
            };

            $articles = Article::where('status', 'published')
                ->where('category_id', $cat->id)
                ->whereNotIn('id', $excludedIds)
                ->orderByDesc('published_at')
                ->limit($limit)
                ->get();

            return [
                'category' => $cat,
                'articles' => $articles,
                'layout' => $layout
            ];
        });

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
