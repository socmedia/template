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
    Route::get('/', 'PostController@index')->middleware(['can:post.access'])->name('index');
    Route::get('/tambah', 'PostController@create')->middleware(['can:post.create'])->name('create');
    Route::get('/edit/{id}', 'PostController@edit')->middleware(['can:post.edit'])->name('edit');
});

Route::group([
    'as' => 'adm.post-type.',
    'prefix' => 'admin/post-type',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    Route::get('/', 'PostTypeController@index')->middleware(['can:post-type.access'])->name('index');
    Route::get('/tambah', 'PostTypeController@create')->middleware(['can:post-type.create'])->name('create');
    Route::get('/edit/{id}', 'PostTypeController@edit')->middleware(['can:post-type.edit'])->name('edit');
});