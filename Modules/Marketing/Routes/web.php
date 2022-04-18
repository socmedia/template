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
        Route::get('/', 'BannerController@index')->name('index');
        Route::get('/tambah', 'BannerController@create')->name('create');
        Route::get('/edit/{id}', 'BannerController@edit')->name('edit');
    });

    Route::group([
        'as' => 'partner.',
        'prefix' => 'partner',
    ], function () {
        Route::get('/', 'ClientController@index')->name('index');
        Route::get('/tambah', 'ClientController@create')->name('create');
        Route::get('/edit/{id}', 'ClientController@edit')->name('edit');
    });

    Route::group([
        'as' => 'testimonial.',
        'prefix' => 'testimonial',
    ], function () {
        Route::get('/', 'TestimonialController@index')->name('index');
        Route::get('/tambah', 'TestimonialController@create')->name('create');
        Route::get('/edit/{id}', 'TestimonialController@edit')->name('edit');
    });

    Route::group([
        'as' => 'faq.',
        'prefix' => 'faq',
    ], function () {
        Route::get('/', 'FaqController@index')->name('index');
        Route::get('/tambah', 'FaqController@create')->name('create');
        Route::get('/edit/{id}', 'FaqController@edit')->name('edit');
    });
});