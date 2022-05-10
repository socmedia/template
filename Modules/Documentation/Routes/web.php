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
    'as' => 'adm.docs.',
    'prefix' => 'admin/documentation',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    Route::get('/', 'DocumentationController@index')->name('index');
    Route::get('/tambah', 'DocumentationController@create')->name('create');
    Route::get('/edit/{id}', 'DocumentationController@edit')->name('edit');
    // Route::get('/download/{type}', 'DocumentationController@download')->name('download');
});