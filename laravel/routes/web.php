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

/*
| Routes for admin users only
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Admin only';
    });
});
