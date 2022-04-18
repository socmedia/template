<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

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

Route::get('/cities', function (Request $request) {
    $res = Http::get('https://ica.rosin-group.com/olive/public_api/kota_json');

    $mapped = array_map(function ($array) {
        return (object) $array;
    }, $res->json());

    Cache::remember('cities', 28800, function () use ($mapped) {
        return $mapped;
    });

    return $mapped;
})->name('api.cities');