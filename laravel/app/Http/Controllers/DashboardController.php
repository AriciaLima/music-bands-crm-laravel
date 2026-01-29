<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Album;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBands = Band::count();
        $totalAlbums = Album::count();

        $bandsWithoutAlbums = Band::doesntHave('albums')->count();

        $bands = Band::withCount('albums')->get();

        $latestAlbums = Album::with('band')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalBands',
            'totalAlbums',
            'bandsWithoutAlbums',
            'bands',
            'latestAlbums'
        ));
    }
}
