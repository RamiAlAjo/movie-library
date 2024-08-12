@extends('layouts.app')

@section('content')
    <h1 class="text-center">Movies</h1>
    <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Add Movie</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actors</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>
                        @foreach($movie->actors as $actor)
                            <span class="badge bg-secondary">{{ $actor->name }}</span>
                        @endforeach
                    </td>
                    <td class="table-actions">
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
