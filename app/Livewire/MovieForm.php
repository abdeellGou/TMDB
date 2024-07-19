<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class MovieForm extends Component
{
    public $movieId;
    public $title;
    public $description;
    public $release_date;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'release_date' => 'required|date',
    ];

    protected $listeners = ['showCreateForm' => 'createMovie', 'showEditForm' => 'editMovie'];

    public function createMovie()
    {
        $this->resetFields();
        $this->dispatchBrowserEvent('show-form');
    }

    public function editMovie($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $this->movieId = $movie->id;
            $this->title = $movie->title;
            $this->description = $movie->description;
            $this->release_date = $movie->release_date;
            $this->dispatchBrowserEvent('show-form');
        }
    }

    public function saveMovie()
    {
        $this->validate();

        if ($this->movieId) {
            $movie = Movie::find($this->movieId);
            $movie->update([
                'title' => $this->title,
                'description' => $this->description,
                'release_date' => $this->release_date,
            ]);
            $this->emit('movieUpdated');
        } else {
            Movie::create([
                'title' => $this->title,
                'description' => $this->description,
                'release_date' => $this->release_date,
            ]);
            $this->emit('movieAdded');
        }

        $this->dispatchBrowserEvent('hide-form');
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->movieId = null;
        $this->title = '';
        $this->description = '';
        $this->release_date = '';
    }

    public function render()
    {
        return view('livewire.movie-form');
    }
}
