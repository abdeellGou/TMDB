@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="https://media.themoviedb.org/t/p/w220_and_h330_face{{ $movie->image_url }}" class="img-fluid" alt="{{ $movie->title }}">
        </div>
        <div class="col-md-8">
            <h1>{{ $movie->title }}</h1>
            <p>{{ $movie->description }}</p>
            <a href="https://www.themoviedb.org/movie/{{ $movie->mid }}" class="btn btn-primary" target="_blank">View on TMDB</a>
        </div>
    </div>
</div>
@endsection
