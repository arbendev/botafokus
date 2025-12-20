<?php

use App\Http\Controllers\Editor\EditorHomeController;
use App\Livewire\Editor\ArticleEdit;
use App\Livewire\Editor\ArticleInbox;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->prefix('editor')->name('editor.')->group(function () {
    Route::get('/', [EditorHomeController::class, 'index'])->name('home');

    Route::get('/articles', ArticleInbox::class)->name('articles.index');
    Route::get('/articles/{article}', ArticleEdit::class)->name('articles.edit');
});

Route::get('/', function () {
    return view('welcome');
});

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
