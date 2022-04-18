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
    'as' => 'adm.post.',
    'prefix' => 'admin/postingan',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/tambah', 'PostController@create')->name('create');
    Route::get('/edit/{id}', 'PostController@edit')->name('edit');
});

Route::group([
    'as' => 'adm.post-type.',
    'prefix' => 'admin/post-type',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    Route::get('/', 'PostTypeController@index')->name('index');
    Route::get('/tambah', 'PostTypeController@create')->name('create');
    Route::get('/edit/{id}', 'PostTypeController@edit')->name('edit');
});