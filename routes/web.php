<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Guest
Route::middleware('guest')->group(function () {
    // Route login
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('viewLogin');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
});


// Auth
Route::middleware('auth')->group(function () {
    // Route dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Route logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('doLogout');
});
