<?php

namespace App\Http\Controllers;

use App\Models\Band;

class BandController extends Controller
{
    public function index()
    {
        $bands = Band::all();
        return view('home', compact('bands'));
    }

    public function show(Band $band)
    {
        $albums = $band->albums;

        return view('bands.show', compact('band', 'albums'));
    }
}
