<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;

class MovieEdit extends Component
{
    public $movie;
    public $title;
    public $description;
    public $image_url;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image_url' => 'nullable|string|max:255',
    ];

    public function mount(Movie $movie)
    {
        $this->movie = $movie;
        $this->title = $movie->title;
        $this->description = $movie->description;
        $this->image_url = $movie->image_url;
    }

    public function updateMovie()
    {
        $this->validate();

        $this->movie->update([
            'title' => $this->title,
            'description' => $this->description,
            'image_url' => $this->image_url,
        ]);

        session()->flash('message', 'Movie successfully updated.');
    }

    public function render()
    {
        return view('livewire.movie-edit');
    }
}
