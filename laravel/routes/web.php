<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlbumController;

/*
|--------------------------------------------------------------------------
| Visualização pública
|--------------------------------------------------------------------------
| Visitantes e users não autenticados
*/

Route::get('/', [BandController::class, 'index'])->name('home');

Route::resource('bands', BandController::class)->only(['index', 'show']);

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
Route::resource('bands', BandController::class)->only(['edit', 'update']);

/*
|--------------------------------------------------------------------------
| Administração
|--------------------------------------------------------------------------
| Apenas admin
*/

Route::middleware(['auth', 'isadmin'])->group(function () {
    Route::resource('bands', BandController::class)->only(['create', 'store', 'destroy']);

    Route::resource('albums', AlbumController::class)->only(['create', 'store', 'destroy']);
});
