<?php

namespace App\Services;

/**
 * Class TMDBService TO get data from API .
 */
class TMDBService
{

    protected $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client(['base_uri' => 'https://api.themoviedb.org/3/']);
    }

    public function getTrendingMovies()
    {
        $response = $this->client->get("trending/movie/day?language=en-US", [
            'headers' => [
                'Authorization' => 'Bearer ' . env('TMDB_API_KEY'),
            ],
            'verify' => false,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

}
