<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class MovieList extends Component
{
    public $movies = [];
    public $search = '';

    protected $listeners = ['movieAdded' => 'refreshMovies', 'movieUpdated' => 'refreshMovies'];

    public function mount()
    {

        $this->movies = Movie::simplePaginate(10);
    }

    public function refreshMovies()
    {

        $this->movies = Movie::simplePaginate(10);
    }

    public function updatedSearch()
    {

        if (!$this->search) {
            $this->movies = Movie::simplePaginate(10);
        } else {
            $this->movies = Movie::where('title', 'like', '%' . $this->search . '%')->simplePaginate(10);
        }
    }

    public function deleteMovie($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $movie->delete();
            $this->refreshMovies();
        }
    }

    public function render()
    {
        return view('livewire.movie-list', ['movies' => $this->movies]);
    }
}
