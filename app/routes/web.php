<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::post('/api/login', [AuthController::class, 'login']);
Route::post('/api/logout', [AuthController::class, 'logout']);
Route::post('/api/register', [AuthController::class, 'register']);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'showRides'])->name('dashboard');

    //Route::get('/rides/create', [DashboardController::class, 'showCreateRouteForm'])->name('showCreateRide');
    //Route::post('/rides/create', [DashboardController::class, 'createRoute'])->name('createRide');
    Route::get('/rides/{id}/edit', [DashboardController::class, 'showEditRide'])
        ->where(['id' => '[0-9]+'])->name('showEditRide');
    Route::post('/rides/{id}/edit', [DashboardController::class, 'editRide'])
        ->where(['id' => '[0-9]+'])->name('editRide');
    Route::post('/rides/{id}/delete', [DashboardController::class, 'deleteRide'])
        ->where(['id' => '[0-9]+'])->name('deleteRide');
});

require __DIR__.'/auth.php';
