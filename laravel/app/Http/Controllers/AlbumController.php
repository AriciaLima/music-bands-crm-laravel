<?php

namespace App\Http\Controllers;

use App\Models\Band;

class AlbumController extends Controller
{
    public function index(Band $band)
    {
        $albums = $band->albums;

        return view('albums.index', compact('band', 'albums'));
    }
}
