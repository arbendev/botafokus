<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(string $slug): View
    {
        $category = Category::where('slug', $slug)
            ->where('active', true)
            ->firstOrFail();

        /**
         * Featured articles (top 2)
         */
        $featured = $category->articles()
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->limit(2)
            ->get();

        /**
         * Main grid articles (next batch)
         */
        $mainArticles = $category->articles()
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->skip(2)
            ->take(6)
            ->get();

        /**
         * Long list (paginated)
         */
        $allArticles = $category->articles()
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->paginate(10);

        /**
         * Sidebar: "Most read" (fallback = latest)
         * Still no views column
         */
        $mostRead = $category->articles()
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->limit(5)
            ->get();

        return view('public.categories.show', compact(
            'category',
            'featured',
            'mainArticles',
            'allArticles',
            'mostRead'
        ));
    }
}
