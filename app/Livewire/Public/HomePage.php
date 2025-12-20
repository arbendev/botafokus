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
            ->limit(8)
            ->get();

        // Section blocks (each category => articles)
        $sections = $categories->map(function ($cat) use ($hero) {
            $q = Article::where('status', 'published')
                ->where('category_id', $cat->id)
                ->orderByDesc('published_at')
                ->limit(6);

            if ($hero) {
                $q->where('id', '!=', $hero->id);
            }

            return [
                'category' => $cat,
                'articles' => $q->get(),
            ];
        });

        return view('livewire.public.home-page', compact('hero', 'topStories', 'sections', 'latestTicker'))
            ->layout('layouts.app');
    }
}
