@extends('layouts.app')

@section('content')
    <h1 class="text-center">Add Movie</h1>
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="actors" class="form-label">Actors:</label>
            <select multiple class="form-control" id="actors" name="actors[]">
                @foreach($actors as $actor)
                    <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
@endsection
