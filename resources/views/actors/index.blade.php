@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Actors</h1>
    <a href="{{ route('actors.create') }}" class="btn btn-primary mb-3">Add Actor</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Birth Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actors as $actor)
                <tr>
                    <td>{{ $actor->name }}</td>
                    <td>{{ $actor->birth_date ? $actor->birth_date->format('Y-m-d') : 'N/A' }}</td>
                    <td class="d-flex">
                        <a href="{{ route('actors.edit', $actor->id) }}" class="btn btn-warning me-2">Edit</a>
                        <form action="{{ route('actors.destroy', $actor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this actor?');">
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
