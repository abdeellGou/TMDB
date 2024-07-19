<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class MovieSearch extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $movies = [];

        if (!$this->searchTerm) {
            $movies = Movie::simplePaginate(5);
        } else {
            $movies = Movie::where('title', 'like', '%' . $this->searchTerm . '%')->simplePaginate(5);
        }
        return view('livewire.movie-search', ['movies' => $movies]);
    }

    public function updatedQ()
    {
        $this->resetPage();
    }

}
