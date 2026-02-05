<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Visualização pública
|--------------------------------------------------------------------------
| Visitantes e users não autenticados
*/
Route::get('/', [BandController::class, 'index'])->name('home');

// Admin routes - create forms
Route::get('/bands/create', [BandController::class, 'create'])->middleware(['auth', 'admin'])->name('bands.create');
Route::get('/albums/create', [AlbumController::class, 'create'])->middleware(['auth', 'admin'])->name('albums.create');

// Public resource routes
Route::resource('bands', BandController::class)->only(['index', 'show']);
Route::resource('albums', AlbumController::class)->only(['show']);

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
| Apenas utilizadores autenticados
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Edição
|--------------------------------------------------------------------------
| User autenticado e admin
*/
Route::middleware('auth')->group(function () {
    Route::resource('bands', BandController::class)->only(['edit', 'update']);
    Route::resource('albums', AlbumController::class)->only(['edit', 'update']);
});

/*
|--------------------------------------------------------------------------
| Administração
|--------------------------------------------------------------------------
| Apenas admin
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('bands', BandController::class)->only(['store', 'destroy']);
    Route::resource('albums', AlbumController::class)->only(['store', 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Fallback
|--------------------------------------------------------------------------
| Captura qualquer rota não definida
*/
Route::fallback(function () {
    return redirect('/');
});
