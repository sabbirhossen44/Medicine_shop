<?php

use App\Http\Controllers\Api\CustomerAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Customer Authentication Routes
Route::prefix('customer')->group(function(){
    Route::post('/register', [CustomerAuthController::class, 'register']);
    Route::post('/login', [CustomerAuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/logout', [CustomerAuthController::class, 'logout']);
    });
});