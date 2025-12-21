<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show(string $slug)
    {
        $article = Article::with('tags', 'category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // "Most read" sidebar
        $mostRead = Article::where('status', 'published')
            ->where('id', '!=', $article->id)
            ->orderByDesc('published_at') // later: orderByDesc('views')
            ->limit(5)
            ->get();

        return view('public.article-show', compact(
            'article',
            'mostRead'
        ));
    }
}
