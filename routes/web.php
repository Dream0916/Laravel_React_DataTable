<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/heroes', function () {
    return view('welcome');
});

Route::get('/weapons', function () {
    return view('welcome');
});

//Route::get('/heroes/get_damage', 'App\Http\Controllers\HeroController@getDamage');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
