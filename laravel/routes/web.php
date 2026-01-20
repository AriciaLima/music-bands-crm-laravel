<?php

use App\Http\Controllers\BandController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BandController::class, 'index']);