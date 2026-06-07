<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing.index');
})->name('home');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Tampilkan form login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

    // Proses login
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.attempt');

    // Tampilkan form registrasi
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

    // Proses registrasi
    Route::post('/register', [RegisterController::class, 'register'])->name('register.attempt');
});

// Logout (hanya untuk user yang sudah login)
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Nilai
    Route::resource('nilai', NilaiController::class)->except(['show']);

    // CRUD Kehadiran
    Route::resource('kehadiran', KehadiranController::class)->except(['show']);
});
