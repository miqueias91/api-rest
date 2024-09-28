<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Student\Controllers\StudentController;

// Protected Routes
Route::middleware('jwt.auth')->group(function () {
    Route::prefix('students')->group(function () {
        Route::get('/', [StudentController::class, 'index']);
        Route::post('/', [StudentController::class, 'store']);
        Route::prefix('/{uuid}')->group(function () {
            Route::get('/', [StudentController::class, 'show']);
            Route::put('/', [StudentController::class, 'update']);
            Route::delete('/', [StudentController::class, 'destroy']);
        });
    });
});
