<?php

use App\Http\Controllers\HeroesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WeaponsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UsersController::class, 'index'])->name('api.users');
Route::get('/heroes', [HeroesController::class, 'index'])->name('api.heroes');
Route::get('/weapons', [WeaponsController::class, 'index'])->name('api.weapons');
