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
    'as' => 'adm.',
    'prefix' => 'admin',
    'middleware' => ['auth', 'verified'],
    // 'role:developer|admin|pemilik_komunitas'
], function () {
    Route::get('/', 'DashboardController@index')->name('index');
});