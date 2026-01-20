<?php

use App\Http\Controllers\BandController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BandController::class, 'index'])->name('home');

Route::get('/bands/{band}', [BandController::class, 'show'])
    ->name('bands.show');
