<?php

use App\Http\Controllers\SiteSearchController;
use Illuminate\Support\Facades\Route;

// Include authentication routes
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

// Site search
Route::get('/search', [SiteSearchController::class, 'index'])->name('search');
