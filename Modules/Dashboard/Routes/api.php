<?php

use Illuminate\Http\Request;
use Modules\Dashboard\Http\Controllers\API\AnalyticsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/dashboard', function (Request $request) {
    return $request->user();
});

Route::group([
    'as' => 'api.analytics',
    'prefix' => 'analytics',
], function () {
    Route::post('/session-page-views', [AnalyticsController::class, 'index'])->name('session-page-views');
});