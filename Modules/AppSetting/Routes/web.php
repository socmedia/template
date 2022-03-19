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