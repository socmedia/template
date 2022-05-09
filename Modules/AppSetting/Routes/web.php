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
    'as' => 'adm.apps.',
    'prefix' => 'admin/site-settings',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', 'AppSettingController@index')->middleware('role:Developer|Admin|User')->name('index');
});

Route::group([
    'as' => 'adm.settings.',
    'prefix' => 'admin/settings',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', 'SettingsController@index')->middleware('role:Developer')->name('index');
    Route::get('/tambah', 'SettingsController@create')->middleware('role:Developer')->name('create');
    Route::get('/edit/{id}', 'SettingsController@edit')->middleware('role:Developer')->name('edit');
});

Route::group([
    'as' => 'adm.artisan.',
    'prefix' => 'admin/artisan',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', 'ArtisanController@index')->middleware('role:Developer')->name('index');
    Route::get('/optimize', 'ArtisanController@optimize')->middleware('role:Developer')->name('optimize');
    Route::get('/storage-link', 'ArtisanController@storageLink')->middleware('role:Developer')->name('storageLink');
    Route::get('/key-generate', 'ArtisanController@keyGenerate')->middleware('role:Developer')->name('keyGenerate');
});

Route::group([
    'as' => 'adm.cms.',
    'prefix' => 'admin/cms',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', 'CmsController@index')->middleware('role:Developer|Admin')->name('index');
    Route::get('/edit/{id}', 'CmsController@edit')->middleware('role:Developer|Admin')->name('edit');
});

Route::group([
    'as' => 'adm.seo.',
    'prefix' => 'admin/seo',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', 'SeoController@index')->middleware('role:Developer|Admin')->name('index');
    Route::get('/edit/{id}', 'SeoController@edit')->middleware('role:Developer|Admin')->name('edit');
});