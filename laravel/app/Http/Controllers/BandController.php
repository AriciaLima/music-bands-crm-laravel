<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
class BandController extends Controller
{
   public function index()
{
    $bands = Band::all();
    
        return view('home', compact('bands'));

}
}          