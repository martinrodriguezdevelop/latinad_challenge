<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DisplayController;

use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/displays', DisplayController::class);
});