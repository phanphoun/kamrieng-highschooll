<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Register (placeholder - will be fully implemented)
    Route::get('/register', function () {
        return redirect()->route('login');
    })->name('register');
    Route::post('/register', function () {
        return redirect()->route('login');
    });

    Route::get('/login', [AuthController::class, 'showLoginForm'])
                ->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
                ->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('password.email');

    Route::get('/reset-password', [ResetPasswordController::class, 'create'])
                ->name('password.reset');
    Route::post('/reset-password/verify', [ResetPasswordController::class, 'verify'])
                ->middleware('throttle:6,1')
                ->name('password.verify');
    Route::get('/reset-password/new', [ResetPasswordController::class, 'edit'])
                ->name('password.new');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
                ->name('logout');
});
