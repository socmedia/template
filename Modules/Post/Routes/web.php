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
    'middleware' => ['auth', 'verified', 'role:Developer|Admin|Editor|Writer'],
], function () {
    Route::get('/', 'PostController@index')->middleware(['can:post.access'])->name('index');
    Route::get('/tambah', 'PostController@create')->middleware(['can:post.create'])->name('create');
    Route::get('/edit/{id}', 'PostController@edit')->middleware(['can:post.edit'])->name('edit');
});

Route::group([
    'as' => 'adm.post-type.',
    'prefix' => 'admin/post-type',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin|Editor'],
], function () {
    Route::get('/', 'PostTypeController@index')->middleware(['can:post-type.access'])->name('index');
    Route::get('/tambah', 'PostTypeController@create')->middleware(['can:post-type.create'])->name('create');
    Route::get('/edit/{id}', 'PostTypeController@edit')->middleware(['can:post-type.edit'])->name('edit');
});

Route::group([
    'as' => 'adm.tag.',
    'prefix' => 'admin/tag',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin|Editor|Writer'],
], function () {
    Route::get('/', 'TagController@index')->middleware(['can:tag.access'])->name('index');
    Route::get('/tambah', 'TagController@create')->middleware(['can:tag.create'])->name('create');
    Route::get('/edit/{id}', 'TagController@edit')->middleware(['can:tag.edit'])->name('edit');
});

Route::group([
    'as' => 'adm.post-featured.',
    'prefix' => 'admin/postingan/unggulan',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin|Editor'],
], function () {
    Route::get('/', 'FeaturedPostController@index')->middleware(['can:faturedpost.access'])->name('index');
    Route::get('/tambah', 'FeaturedPostController@create')->middleware(['can:faturedpost.create'])->name('create');
    Route::get('/edit/{id}', 'FeaturedPostController@edit')->middleware(['can:faturedpost.edit'])->name('edit');
});