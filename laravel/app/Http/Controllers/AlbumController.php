<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create()
    {
        $bands = Band::all();

        return view('albums.create', compact('bands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'band_id' => 'required|exists:bands,id',
            'name' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'image' => 'nullable|string',
        ]);

        Album::create($validated);

        return redirect()->route('bands.show', $validated['band_id']);
    }

    public function edit(Album $album)
    {
        $bands = Band::all();

        return view('albums.edit', compact('album', 'bands'));
    }

    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'band_id' => 'required|exists:bands,id',
            'name' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_file')) {
            $validated['image'] = $request->file('image_file')->store('albums', 'public');
        } elseif ($request->filled('image')) {
            // Keep the existing image value from the form
        }   
        unset($validated['image_file']);
        $album->update($validated);

        return redirect()->route('bands.show', $validated['band_id']);
    }

    public function destroy(Album $album)
    {
        $bandId = $album->band_id;

        $album->delete();

        return redirect()->route('bands.show', $bandId);
    }
}
