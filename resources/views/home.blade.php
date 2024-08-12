@extends('layouts.app')

@section('content')
    <h1>Movies List</h1>
    @foreach($movies as $movie)
        <div>
            <h2>{{ $movie->title }}</h2>
            <p>{{ $movie->description }}</p>
            <h4>Actors:</h4>
            <ul>
                @foreach($movie->actors as $actor)
                    <li>{{ $actor->name }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection
