<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

// Include authentication routes
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

// Public Pages — About Section
Route::prefix('/about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
    Route::get('/mission-vision', [AboutController::class, 'missionVision'])->name('mission-vision');
    Route::get('/leadership', [AboutController::class, 'leadership'])->name('leadership');
});
