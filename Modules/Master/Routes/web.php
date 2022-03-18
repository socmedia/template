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
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/sampah', 'CategoryController@trash')->name('trash');
        Route::get('/tambah', 'CategoryController@create')->name('create');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
    });

    // Route Sub Category
    Route::group([
        'as' => 'sub-category.',
        'prefix' => 'subkategori',
    ], function () {
        Route::get('/', 'SubCategoryController@index')->name('index');
        Route::get('/sampah', 'SubCategoryController@trash')->name('trash');
        Route::get('/tambah', 'SubCategoryController@create')->name('create');
        Route::get('/edit/{id}', 'SubCategoryController@edit')->name('edit');
    });
});
