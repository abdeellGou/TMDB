<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class MovieCreate extends Component
{
    public $title;
    public $description;
    public $image_url;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image_url' => 'nullable|string|max:255',
    ];

    public function createMovie()
    {
        $this->validate();

        Movie::create([
            'title' => $this->title,
            'description' => $this->description,
            'image_url' => $this->image_url,
        ]);

        session()->flash('message', 'Movie successfully created.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.movie-create');
    }
}
