<?php

use App\Http\Controllers\Editor\EditorHomeController;
use App\Http\Controllers\Public\ArticleController;
use App\Http\Controllers\Public\CategoryController;
use App\Livewire\Editor\AiJobLogIndex;
use App\Livewire\Editor\ArticleEdit;
use App\Livewire\Editor\ArticleInbox;
use App\Livewire\Editor\CategoryIndex;
use App\Livewire\Editor\SourceSubmit;
use App\Livewire\Editor\UrlSubmit;
use App\Livewire\Public\HomePage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Editor / Staff Routes
|--------------------------------------------------------------------------
| All editorial functionality lives under /editor
| Protected by auth middleware
*/

Route::middleware(['web', 'auth'])
    ->prefix('editor')
    ->name('editor.')
    ->group(function () {

        Route::get('/', [EditorHomeController::class, 'index'])
            ->name('home');

        // Articles
        Route::get('/articles', ArticleInbox::class)
            ->name('articles.index');

        Route::get('/articles/{article}', ArticleEdit::class)
            ->name('articles.edit');

        // Source ingestion
        Route::get('/sources/submit', SourceSubmit::class)
            ->name('sources.submit');

        Route::get('/sources/submit-url', UrlSubmit::class)
            ->name('sources.submit_url');

        // AI logs
        Route::get('/ai/logs', AiJobLogIndex::class)
            ->name('ai.logs');
    });

/*
|--------------------------------------------------------------------------
| Public Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/', HomePage::class)
    ->name('home');

Route::get('/categories', CategoryIndex::class)
    ->name('categories.index');

Route::get('/categories/{slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

Route::get('/news/{slug}', [ArticleController::class, 'show'])
    ->name('articles.show');

Route::get('/topics/{slug}', function (string $slug) {
    $tag = \App\Models\Tag::where('slug', $slug)->firstOrFail();

    $articles = $tag->articles()
        ->where('status', 'published')
        ->paginate(12);

    return view('public.topic-show', compact('tag', 'articles'));
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

/*
|--------------------------------------------------------------------------
| Legacy / Static Demo Pages (Optional)
|--------------------------------------------------------------------------
| These can be removed once fully dynamic
*/

Route::get('/categories/article', fn() => view('news.show'));
Route::get('/videos', fn() => view('videos.index'));
Route::get('/videos/video', fn() => view('videos.show'));
Route::get('/search', [App\Http\Controllers\Public\SearchController::class, 'index'])
    ->name('search.index');
