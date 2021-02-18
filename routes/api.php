<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\UserController;

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
// untuk akses ketika setelah login
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::post('logout', [UserController::class, 'logout']);

    // API Transaksi
    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('transaction/{$id}', [TransactionController::class, 'update']);
});

// untuk akses sebelum login
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

// API Food
Route::get('food', [FoodController::class, 'all']);
