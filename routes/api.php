<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout']);
    Route::post('/changePassword', [AdminAuthController::class, 'changePassword']);

    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::post('/login', [AdminAuthController::class, 'login']);
