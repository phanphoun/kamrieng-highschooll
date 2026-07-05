<?php

use Illuminate\Support\Facades\Route;

// Include authentication routes
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});
