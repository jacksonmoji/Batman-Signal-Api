<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanicController;
use App\Http\Controllers\LoginController;
use App\Models\Panic;
use App\Http\Resources\PanicResource;
use App\Http\Resources\PanicCollection;

use App\Http\Controllers\AuthenticationController;

Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('panics')->group(function () {
        Route::controller(PanicController::class)->group(function () {
            Route::post('/sends', 'sendPanic');
            Route::post('/cancels', 'cancelPanic');
            Route::get('/history','panicHistory');
            Route::post('/status', 'updatePanicStatus');
        });
    });
});


