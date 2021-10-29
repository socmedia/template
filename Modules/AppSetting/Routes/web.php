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
    'as' => 'adm.user.apps.',
    'prefix' => 'admin/apps',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin|User'],
], function () {
    Route::get('/', 'AppSettingController@index')->name('index');
});