<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class MovieDelete extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteMovie($movieId)
    {
        Movie::find($movieId)->delete();
        session()->flash('message', 'Movie successfully deleted.');
    }

    public function render()
    {
        $movies = Movie::where('title', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.movie-delete', [
            'movies' => $movies,
        ]);
    }
}
