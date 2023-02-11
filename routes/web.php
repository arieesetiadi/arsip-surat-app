<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Clear app
Route::get('/clear-app', function(){
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return back();
});


// Guest
Route::middleware('guest')->group(function () {
    // Route Login
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('viewLogin');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
});


// Auth
Route::middleware('auth')->group(function () {
    // Route Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Route Logout
    Route::get('/logout', [AuthController::class, 'doLogout'])->name('doLogout');

    // Route Profile
    Route::get('/profile', [AuthController::class, 'viewProfile'])->name('viewProfile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('updateProfile');

    // Route User
    Route::
});
