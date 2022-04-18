<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Front\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/sitemap.xml', [FrontController::class, 'sitemap']);

Route::group([
    'as' => 'front.post.',
    'prefix' => 'post',
], function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/{slug_title}', [PostController::class, 'show'])->name('show');
});

require __DIR__ . '/auth.php';