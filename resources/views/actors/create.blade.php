@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Add Actor</h1>
    <form action="{{ route('actors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">Birth Date:</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date">
        </div>
        <button type="submit" class="btn btn-primary">Add Actor</button>
        <a href="{{ route('actors.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
@endsection
