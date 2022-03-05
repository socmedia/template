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
    'as' => 'adm.access-level.user.',
    'prefix' => 'admin/user',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/sampah', 'UserController@trash')->name('trash');
    Route::get('/tambah', 'UserController@create')->name('create');
    Route::get('/{id}', 'UserController@show')->name('show');
    Route::get('/edit/{id}', 'UserController@edit')->name('edit');
    Route::get('/download/{type}', 'UserController@download')->name('download');
});

Route::group([
    'as' => 'adm.access-level.role.',
    'prefix' => 'admin/role',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    Route::get('/', 'RoleController@index')->name('index');
    Route::get('/tambah', 'RoleController@create')->name('create');
    Route::get('/edit/{id}', 'RoleController@edit')->name('edit');
    Route::get('/download/{type}', 'RoleController@download')->name('download');
});
