<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Surat\SuratKeluarController;
use App\Http\Controllers\Surat\SuratMasukController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Guest
Route::middleware('guest')->group(function () {
    // Route untuk Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});


// Auth
Route::middleware('auth')->group(function () {
    // Route untuk Dashboard
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Route untuk Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Route untuk kelola Pengguna
    Route::get('/profile', [PenggunaController::class, 'profileView'])->name('profile.view');
    Route::put('/profile/update', [PenggunaController::class, 'profileUpdate'])->name('profile.update');
    Route::resource('/pengguna', PenggunaController::class);

    // Route surat masuk
    Route::resource('/surat-masuk', SuratMasukController::class);

    // Route surat keluar
    Route::resource('/surat-keluar', SuratKeluarController::class);
});


// Clear app
Route::get('/clear-app', function(){
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return back();
});

// Hash text
Route::get('/hash/{text}', function($text){
    $hashedText = Hash::make($text);
    dd($hashedText);
});