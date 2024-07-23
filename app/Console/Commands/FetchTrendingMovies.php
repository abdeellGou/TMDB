<?php

namespace App\Console\Commands;

use App\Models\Movie;
use App\Services\TMDBService;
use Illuminate\Console\Command;

class FetchTrendingMovies extends Command
{
    protected $signature = 'tmd²h';
    protected $description = 'Fetch trending movies and store in the database';

    protected $tmdbService;

    public function __construct(TMDBService $tmdbService)
    {
        parent::__construct();
        $this->tmdbService = $tmdbService;
    }

    public function handle()
    {
        $movies = $this->tmdbService->getTrendingMovies();

        foreach ($movies['results'] as $movieData) {
            Movie::updateOrCreate(
                ['mid' => $movieData['id']],
                [
                    'title' => $movieData['title'],
                    'description' => $movieData['overview'],
                    'image_url' => $movieData['poster_path'],
                    'release_date' => $movieData['release_date'],
                ]
            );
        }

        $this->info('Trending movies fetched successfully!');
    }
}
