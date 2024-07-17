<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::paginate(5);
        return view('movies.index', compact('movies'));
    }

    /**
     * Display the specified movie.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

}
