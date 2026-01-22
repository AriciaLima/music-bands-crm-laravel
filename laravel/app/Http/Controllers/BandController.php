<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        $bands = Band::withCount('albums')->get();

        return view('home', compact('bands'));
    }

    public function show(Band $band)
    {
        $albums = $band->albums;

        return view('bands.show', compact('band', 'albums'));
    }

    public function create()
    {
        return view('bands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'formed_year' => 'nullable|integer',
            'image' => 'nullable|string',
        ]);

        Band::create($validated);

        return redirect()->route('home');
    }

    public function edit(Band $band)
    {
        return view('bands.edit', compact('band'));
    }

    public function update(Request $request, Band $band)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'formed_year' => 'nullable|integer',
            'image' => 'nullable|string',
        ]);

        $band->update($validated);

        return redirect()->route('bands.show', $band);
    }

    public function destroy(Band $band)
    {
        $band->delete();

        return redirect()->route('home');
    }
}
