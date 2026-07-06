<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
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
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
