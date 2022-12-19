<?php

use App\Http\Controllers\Api\DogController;
use App\Http\Controllers\Api\InteractionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(DogController::class)->group(function () {
    Route::get('dogs', 'index');
    Route::post('dogs', 'store');
    Route::get('dogs/{id}', 'show');
    Route::put('dogs/{id}', 'update');
    Route::delete('dogs/{id}', 'destroy');
});

Route::controller(InteractionController::class)->group(function () {
    Route::get('interactions', 'index');
    Route::post('interactions', 'store');
    Route::get('interactions/{id}', 'show');
    Route::put('interactions/{id}', 'update');
    Route::delete('interactions/{id}', 'destroy');
});
