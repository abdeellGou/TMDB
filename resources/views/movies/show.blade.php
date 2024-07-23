@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/3">
            <img src="https://media.themoviedb.org/t/p/w220_and_h330_face{{ $movie->image_url }}" class="w-full h-auto" alt="{{ $movie->title }}">
        </div>
        <div class="w-full md:w-2/3 mt-4 md:mt-0 md:pl-4">
            <h1 class="text-2xl font-bold">{{ $movie->title }}</h1>
            <p class="mt-2">{{ $movie->description }}</p>
            <a href="https://www.themoviedb.org/movie/{{ $movie->mid }}" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded" target="_blank">View on TMDB</a>
        </div>
    </div>
</div>

@endsection
