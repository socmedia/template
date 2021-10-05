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
    'as' => 'adm.user.',
    'prefix' => 'admin',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin|User'],
], function () {
    Route::get('/', 'UserController@index')->name('index');

    Route::group([
        'as' => 'profile.',
        'prefix' => 'profile',
    ], function () {
        Route::get('/', 'ProfileController@index')->name('index');
    });
});