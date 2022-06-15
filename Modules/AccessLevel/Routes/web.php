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
    Route::get('/', 'UserController@index')->middleware(['can:users.access'])->name('index');
    Route::get('/sampah', 'UserController@trash')->middleware(['can:users.delete'])->name('trash');
    Route::get('/tambah', 'UserController@create')->middleware(['can:users.create'])->name('create');
    // Route::get('/{id}', 'UserController@show')->middleware(['can:users.show'])->name('show');
    Route::get('/edit/{id}', 'UserController@edit')->middleware(['can:users.edit'])->name('edit');
    Route::get('/download/{type}', 'UserController@download')->middleware(['can:users.download'])->name('download');
});

Route::group([
    'as' => 'adm.access-level.role.',
    'prefix' => 'admin/role',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    Route::get('/', 'RoleController@index')->middleware(['can:roles.access'])->name('index');
    Route::get('/tambah', 'RoleController@create')->middleware(['can:roles.create'])->name('create');
    Route::get('/edit/{id}', 'RoleController@edit')->middleware(['can:roles.edit'])->name('edit');
    Route::get('/download/{type}', 'RoleController@download')->middleware(['can:roles.download'])->name('download');
});

Route::group([
    'as' => 'adm.access-level.permission.',
    'prefix' => 'admin/permission',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    Route::get('/', 'PermissionController@index')->middleware(['can:permissions.access'])->name('index');
    Route::get('/tambah', 'PermissionController@create')->middleware(['can:permissions.create'])->name('create');
    Route::get('/edit/{id}', 'PermissionController@edit')->middleware(['can:permissions.edit'])->name('edit');
    Route::get('/download/{type}', 'PermissionController@download')->middleware(['can:permissions.download'])->name('download');
});
