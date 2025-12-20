<?php
namespace App\Http\Controllers\Public;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController
{
    public function show(string $slug): View
    {
        $article = Article::with(['tags'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // increment view count safely
        $article->increment('view_count');

        return view('public.article-show', compact('article'));
    }
}
