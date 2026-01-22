<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', [BandController::class, 'index'])->name('home');

Route::get('/bands/{band}', [BandController::class, 'show'])
    ->name('bands.show');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Admin only';
    });
});
