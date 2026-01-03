<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->input('q');

        if (!$query) {
            return view('search.index', [
                'articles' => collect(),
                'query' => '',
                'seo' => $this->getSeoData('Kërko'),
            ]);
        }

        $articles = Article::where('status', 'published')
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('lead', 'like', "%{$query}%")
                  ->orWhere('body', 'like', "%{$query}%");
            })
            ->orderByDesc('published_at')
            ->paginate(10)
            ->withQueryString();

        return view('search.index', [
            'articles' => $articles,
            'query' => $query,
            'seo' => $this->getSeoData("Kërkimi: $query"),
        ]);
    }

    private function getSeoData(string $title): array
    {
        return [
            'title' => $title,
            'description' => "Rezultatet e kërkimit në Bota Fokus për: $title",
            'image' => asset('/bota-focus-og.jpg'),
            'url' => url()->full(),
        ];
    }
}
