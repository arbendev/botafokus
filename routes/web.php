<?php

use App\Http\Controllers\Editor\EditorHomeController;
use App\Http\Controllers\Public\ArticleController;
use App\Http\Controllers\Public\CategoryController;
use App\Livewire\Editor\AiJobLogIndex;
use App\Livewire\Editor\ArticleEdit;
use App\Livewire\Editor\ArticleInbox;
use App\Livewire\Editor\CategoryIndex;
use App\Livewire\Editor\SourceSubmit;
use App\Livewire\Public\HomePage;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->prefix('editor')->name('editor.')->group(function () {
    Route::get('/', [EditorHomeController::class, 'index'])->name('home');

    Route::get('/articles', ArticleInbox::class)->name('articles.index');
    Route::get('/articles/{article}', ArticleEdit::class)->name('articles.edit');

    Route::get('/sources/submit', SourceSubmit::class)->name('sources.submit');
    Route::get('/ai/logs', AiJobLogIndex::class)->name('ai.logs');
});

Route::get('/', HomePage::class)->name('home');

Route::get('/categories', CategoryIndex::class)->name('categories.index');

Route::get('/categories/{slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

Route::get('/news/{slug}', [ArticleController::class, 'show'])
    ->name('articles.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categories', function () {
    return view('news.index');
});

Route::get('/categories/article', function () {
    return view('news.show');
});

Route::get('/videos', function () {
    return view('videos.index');
});

Route::get('/videos/video', function () {
    return view('videos.show');
});

Route::get('/search', function () {
    return view('search.index');
});
