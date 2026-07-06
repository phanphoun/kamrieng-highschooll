<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\NewsController;

// Include authentication routes
require __DIR__.'/auth.php';

// Locale switcher
Route::get('/locale/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'kh'])) {
        abort(404);
    }
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return redirect()->back();
})->name('locale.switch');

// Public News Routes
Route::prefix('news')->name('public.news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{news:slug}', [NewsController::class, 'show'])->name('show');
});

Route::get('/', function () {
    return view('welcome');
});
