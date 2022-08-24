<?php

use App\Http\Controllers\RideController;
use App\Http\Controllers\UserController;
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

Route::get('/users', [UserController::class, "getUsers"]);

Route::get('/rides/user/{id}', [RideController::class, "getRidesOfUser"])->where(['id' => '[0-9]+']);

Route::get('/rides/{id}/comments', [RideController::class, "getComments"])->where(['id' => '[0-9]+']);

Route::apiResource('rides', RideController::class);
