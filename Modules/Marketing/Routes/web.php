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

Route::group([
    'as' => 'adm.marketing.',
    'prefix' => 'admin',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {

    Route::group([
        'as' => 'banner.',
        'prefix' => 'banner',
    ], function () {
        Route::get('/', 'BannerController@index')->middleware(['can:banner.access'])->name('index');
        Route::get('/tambah', 'BannerController@create')->middleware(['can:banner.create'])->name('create');
        Route::get('/edit/{id}', 'BannerController@edit')->middleware(['can:banner.edit'])->name('edit');
    });

    Route::group([
        'as' => 'partner.',
        'prefix' => 'partner',
    ], function () {
        Route::get('/', 'ClientController@index')->middleware(['can:partner.access'])->name('index');
        Route::get('/tambah', 'ClientController@create')->middleware(['can:partner.create'])->name('create');
        Route::get('/edit/{id}', 'ClientController@edit')->middleware(['can:partner.edit'])->name('edit');
    });

    Route::group([
        'as' => 'testimonial.',
        'prefix' => 'testimonial',
    ], function () {
        Route::get('/', 'TestimonialController@index')->middleware(['can:testimonial.access'])->name('index');
        Route::get('/tambah', 'TestimonialController@create')->middleware(['can:testimonial.create'])->name('create');
        Route::get('/edit/{id}', 'TestimonialController@edit')->middleware(['can:testimonial.edit'])->name('edit');
    });

    Route::group([
        'as' => 'faq.',
        'prefix' => 'faq',
    ], function () {
        Route::get('/', 'FaqController@index')->middleware(['can:faq.access'])->name('index');
        Route::get('/tambah', 'FaqController@create')->middleware(['can:faq.create'])->name('create');
        Route::get('/edit/{id}', 'FaqController@edit')->middleware(['can:faq.edit'])->name('edit');
    });
});
