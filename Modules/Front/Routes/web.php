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
    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/tentang-kami', [FrontController::class, 'about'])->name('about');
    Route::get('/cek-paket', [FrontController::class, 'receipt'])->name('receipt');
    Route::get('/cek-tarif', [FrontController::class, 'shippingRate'])->name('shippingRate');
    Route::get('/lokasi-agen', [FrontController::class, 'agentLocation'])->name('agentLocation');
    Route::get('/promo', [FrontController::class, 'promo'])->name('promo.index');
    Route::get('/promo/{slug}', [FrontController::class, 'showPromo'])->name('promo.show');
    Route::get('/event', [FrontController::class, 'event'])->name('event.index');
    Route::get('/event/{slug}', [FrontController::class, 'showEvent'])->name('event.show');
    Route::get('/blog', [FrontController::class, 'blog'])->name('blog.index');
    Route::get('/blog/{slug}', [FrontController::class, 'showBlog'])->name('blog.show');
    Route::get('/produk-layanan', [FrontController::class, 'service'])->name('service.index');
    Route::get('/produk-layanan/{service:slug_name}', [FrontController::class, 'showService'])->name('service.show');
    Route::get('/syarat-ketentuan-pengiriman', [FrontController::class, 'tnc'])->name('tnc');
    Route::get('/kemitraan-agen', [FrontController::class, 'partnership'])->name('partnership');
    Route::get('/solusi-bisnis', [FrontController::class, 'bussinessSolution'])->name('bussinessSolution');
    Route::get('/sohib-rosalia-express', [FrontController::class, 'sohib'])->name('sohib');
    Route::get('/hubungi-kami', [FrontController::class, 'contact'])->name('contact');
});