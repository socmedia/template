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
    'as' => 'adm.service.',
    'prefix' => 'admin/layanan',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    Route::get('/', 'ServiceController@index')->name('index');
    // Route::get('/sampah', 'ServiceController@trash')->name('trash');
    Route::get('/tambah', 'ServiceController@create')->name('create');
    Route::get('/edit/{id}', 'ServiceController@edit')->name('edit');
});