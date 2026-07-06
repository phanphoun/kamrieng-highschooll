<?php

use Illuminate\Support\Facades\Route;

// Include authentication routes
require __DIR__.'/auth.php';

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
