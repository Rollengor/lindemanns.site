<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Public\HomePageController::class, 'index'])->name('public.home');
Route::get('/news', [App\Http\Controllers\Public\News\NewsPageController::class, 'index'])->name('public.news');
Route::get('/news/article', [App\Http\Controllers\Public\News\ArticlePageController::class, 'index'])->name('public.news.article');

//Route::get('/services', [App\Http\Controllers\Public\ServicesPageController::class, 'index'])->name('public.services');
//Route::get('/gallery', [App\Http\Controllers\Public\GalleryPageController::class, 'index'])->name('public.gallery');

Route::group([
    'middleware' => [App\Http\Middleware\ThrottleEmails::class],
], function () {

    //Route::post('/order', [App\Http\Controllers\Public\OrderController::class, 'store'])->name('public.order');
    //Route::post('/review', [App\Http\Controllers\Public\SendReviewController::class, 'store'])->name('public.review');

});
