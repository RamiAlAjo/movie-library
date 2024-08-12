<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Actor;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('actors')->get();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $actors = Actor::all();
        return view('movies.create', compact('actors'));
    }

    public function store(Request $request)
    {
        $movie = Movie::create($request->only('title', 'description'));
        $movie->actors()->attach($request->actors);
        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    public function edit(Movie $movie)
    {
        $actors = Actor::all();
        return view('movies.edit', compact('movie', 'actors'));
    }

    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->only('title', 'description'));
        $movie->actors()->sync($request->actors);
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->actors()->detach();
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
