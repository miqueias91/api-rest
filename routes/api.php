<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->group(function () {
        // Public Routes
        Route::prefix('auth')->group(function () {
            Route::post('login', [AuthController::class, 'login']);
        });

        // Protected Routes
        Route::middleware('jwt.auth')->group(function () {
            Route::prefix('students')->group(function () {
                Route::get('/', [StudentsController::class, 'index']);
                Route::get('/{id}', [StudentsController::class, 'show']);
                Route::post('/', [StudentsController::class, 'store']);
            });
        });
    });
