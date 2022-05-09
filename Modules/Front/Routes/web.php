<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use Modules\Front\Http\Controllers\FrontController;

Route::group([
    'as' => 'front.',
    'prefix' => '/',
], function () {

    Route::get('/sitemap.xml', [FrontController::class, 'sitemap'])->name('sitemap');

    Route::group([
        'as' => 'post.',
        'prefix' => '/',
    ], function () {
        Route::get('/posts', [FrontController::class, 'posts'])->name('index');
        Route::get('/post/{slug_title}', [FrontController::class, 'showPost'])->name('show');
    });
});