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
    'as' => 'adm.lead.',
    'prefix' => 'admin/lead',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    Route::get('/', 'LeadController@index')->middleware(['can:lead.access'])->name('index');
});
