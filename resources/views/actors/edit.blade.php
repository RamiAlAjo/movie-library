@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Edit Actor</h1>
    <form action="{{ route('actors.update', $actor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $actor->name }}" required>
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">Birth Date:</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $actor->birth_date ? $actor->birth_date->format('Y-m-d') : '' }}">
        </div>
        <button type="submit" class="btn btn-warning">Update Actor</button>
        <a href="{{ route('actors.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
@endsection
