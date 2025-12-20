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

        $mostRead = Article::where('category_id', $category->id)
            ->where('status', 'published')
            ->orderByDesc('view_count')
            ->limit(5)
            ->get();

        return view('public.article-show', compact('article'));
    }
}
