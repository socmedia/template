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

// Route::prefix('master')->group(function() {
//     Route::get('/', 'MasterController@index');
// });

Route::group([
    'as' => 'adm.master.',
    'prefix' => 'admin/master',
    'middleware' => ['auth', 'verified', 'role:Developer|Admin'],
], function () {
    // Route Category
    Route::group([
        'as' => 'category.',
        'prefix' => 'kategori',
    ], function () {
        Route::get('/', 'CategoryController@index')->middleware(['can:category.access'])->name('index');
        Route::get('/sampah', 'CategoryController@trash')->middleware(['can:category.delete'])->name('trash');
        Route::get('/tambah', 'CategoryController@create')->middleware(['can:category.create'])->name('create');
        Route::get('/edit/{id}', 'CategoryController@edit')->middleware(['can:category.edit'])->name('edit');
    });

    // Route Sub Category
    Route::group([
        'as' => 'sub-category.',
        'prefix' => 'subkategori',
    ], function () {
        Route::get('/', 'SubCategoryController@index')->middleware(['can:sub-category.access'])->name('index');
        Route::get('/sampah', 'SubCategoryController@trash')->middleware(['can:sub-category.delete'])->name('trash');
        Route::get('/tambah', 'SubCategoryController@create')->middleware(['can:sub-category.create'])->name('create');
        Route::get('/edit/{id}', 'SubCategoryController@edit')->middleware(['can:sub-category.edit'])->name('edit');
    });
});
