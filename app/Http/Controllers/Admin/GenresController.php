<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index()
    {
        $genres = Genre::get();
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Genre::create($request->all());
        return to_route('genres.index')->with('success', 'Genre created successfully');
    }

    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $genre->update($request->all());
        return to_route('genres.index')->with('success', 'Genre updated successfully');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return to_route('genres.index')->with('success', 'Genre deleted successfully');
    }
}
