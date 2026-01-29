<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'genre' => 'required|string|max:255',
            'formed_year' => 'required|integer',
            'image_url' => 'nullable|string',
            'image_file' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            $validated['image'] = $request->file('image_file')->store('bands', 'public');
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $validated['image_url'];
        }

        unset($validated['image_url'], $validated['image_file']);

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
            'genre' => 'required|string|max:255',
            'formed_year' => 'required|integer',
            'image_url' => 'nullable|string',
            'image_file' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);
        if ($request->hasFile('image_file')) {
            $validated['image'] = $request->file('image_file')->store('bands', 'public');
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $validated['image_url'];
        }   
        unset($validated['image_url'], $validated['image_file']);
        $band->update($validated);

        return redirect()->route('bands.show', $band);
    }

    public function destroy(Band $band)
    {
        $band->delete();

        return redirect()->route('home');
    }
}
