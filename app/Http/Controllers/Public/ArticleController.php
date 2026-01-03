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

        // Prepare SEO Data
        $seo = [
            'title' => $article->seo_title ?? $article->title,
            'description' => $article->seo_description ?? \Illuminate\Support\Str::limit($article->lead, 155),
            'image' => $article->hero_image_url ? asset($article->hero_image_url) : asset('/bota-focus-og.jpg'),
            'url' => route('articles.show', $article->slug),
            'published_at' => $article->published_at ? $article->published_at->toIso8601String() : now()->toIso8601String(),
            'modified_at' => $article->updated_at->toIso8601String(),
            'category' => $article->category->name ?? 'News',
            'author' => 'Bota Fokus',
        ];

        return view('public.article-show', compact(
            'article',
            'mostRead',
            'seo'
        ));
    }
}
