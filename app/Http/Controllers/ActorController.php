<?php


namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    // Display a listing of actors
    public function index()
    {
        $actors = Actor::all();
        return view('actors.index', compact('actors'));
    }

    // Show the form for creating a new actor
    public function create()
    {
        return view('actors.create');
    }

    // Store a newly created actor in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
        ]);

        Actor::create($request->only('name', 'birth_date'));

        return redirect()->route('actors.index')->with('success', 'Actor created successfully.');
    }

    // Show the form for editing the specified actor
    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    // Update the specified actor in the database
    public function update(Request $request, Actor $actor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
        ]);

        $actor->update($request->only('name', 'birth_date'));

        return redirect()->route('actors.index')->with('success', 'Actor updated successfully.');
    }

    // Remove the specified actor from the database
    public function destroy(Actor $actor)
    {
        $actor->delete();

        return redirect()->route('actors.index')->with('success', 'Actor deleted successfully.');
    }
}
