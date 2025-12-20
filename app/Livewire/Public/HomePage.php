<?php
namespace App\Livewire\Public;

use App\Models\Article;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.public.home-page', [
            'hero'     => Article::where('status', 'published')
                ->where('is_featured', true)
                ->orderByDesc('published_at')
                ->first(),

            'latest'   => Article::where('status', 'published')
                ->orderByDesc('published_at')
                ->limit(6)
                ->get(),

            'mostRead' => Article::where('status', 'published')
                ->orderByDesc('view_count')
                ->limit(5)
                ->get(),
        ])->layout('layouts.app');
    }
}
