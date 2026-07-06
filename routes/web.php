<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

// Include authentication routes
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

// Placeholder dashboards so the post-login role redirect (T-03) works.
// These will be replaced by real role route groups + middleware in T-11 (US-02).
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard.placeholder')->name('dashboard');
    Route::view('/admin/dashboard', 'dashboard.placeholder')->name('admin.dashboard');
    Route::view('/teacher/dashboard', 'dashboard.placeholder')->name('teacher.dashboard');
    Route::view('/student/dashboard', 'dashboard.placeholder')->name('student.dashboard');
    Route::view('/parent/dashboard', 'dashboard.placeholder')->name('parent.dashboard');
    Route::view('/editor/dashboard', 'dashboard.placeholder')->name('editor.dashboard');
});
// Public Pages — About Section
Route::prefix('/about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
    Route::get('/mission-vision', [AboutController::class, 'missionVision'])->name('mission-vision');
    Route::get('/leadership', [AboutController::class, 'leadership'])->name('leadership');
});
