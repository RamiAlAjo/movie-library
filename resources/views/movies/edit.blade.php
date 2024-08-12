@extends('layouts.app')

@section('content')
    <h1 class="text-center">Edit Movie</h1>
    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ $movie->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="actors" class="form-label">Actors:</label>
            <select multiple class="form-control" id="actors" name="actors[]">
                @foreach($actors as $actor)
                    <option value="{{ $actor->id }}" {{ in_array($actor->id, $movie->actors->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $actor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update Movie</button>
    </form>
@endsection
