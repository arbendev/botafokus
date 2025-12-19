<?php

use Illuminate\Support\Facades\Route;

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
