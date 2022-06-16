<?php

use App\Http\Controllers\MediaController;

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

require __DIR__ . '/auth.php';

Route::group([
    'as' => 'media.',
    'prefix' => 'media',
], function () {
    Route::post('/upload-image', [MediaController::class, 'uploadImage'])->name('uploadImage');
    Route::post('/remove-image', [MediaController::class, 'destroyImage'])->name('destroyImage');
});