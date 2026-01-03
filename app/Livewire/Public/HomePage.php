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

        // Unified 4x2 Grid Layout: Fetch all active categories
        // We want 8 categories total (or however many are active)
        // Each needs 5 articles: 1 Featured + 4 List items
        $categories = Category::where('active', true)
            ->orderBy('order_index')
            ->take(8) // Ensure we stick to the 4x2 design if strictly needed, or just all. User said "currently we have 8 categories" so getting all active is fine.
            ->get();

        // Track IDs to prevent duplication across categories
        $globalExcludedIds = collect();
        if ($hero) {
            $globalExcludedIds->push($hero->id);
        }
        // Optionally exclude top stories too if we want zero overlap there
        // $globalExcludedIds = $globalExcludedIds->merge($topStories->pluck('id'));

        $sections = collect();

        foreach ($categories as $cat) {
            // Fetch latest 5 articles for this category via Many-to-Many relationship
            // Exclude ANY article already shown in Hero or previous categories
            $articles = $cat->articles()
                ->where('status', 'published')
                ->whereNotIn('articles.id', $globalExcludedIds)
                ->orderByDesc('published_at')
                ->limit(5)
                ->get();

            // Add these to the excluded list so they don't show up in next categories
            $globalExcludedIds = $globalExcludedIds->merge($articles->pluck('id'));

            $sections->push([
                'category' => $cat,
                'articles' => $articles,
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
