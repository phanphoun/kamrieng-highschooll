<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController; // ✅ ADD THIS

// Include authentication routes
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('contact');
});

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');