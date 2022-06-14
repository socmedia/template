<?php

use App\Models\User;
use Illuminate\Support\Str;

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

Route::get('test', function (){
    $user = User::create([
        'id' => Str::random(8),
        'name' => 'SOC Media Agency',
        'email' => 'hello@socmediaagency.com',
        'password' => bcrypt('ZyplineUntukKitaSemua 082021')
    ]);

    dd($user);
}) ;
