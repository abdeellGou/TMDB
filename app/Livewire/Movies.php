<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class Movies extends Component
{
    public $movies, $movie_id, $mid, $title, $description, $release_date, $isOpen = 0;
    public $search = '';

    public function render()
    {
        // $this->movies = Movie::where('title', 'like', '%' . $this->search . '%')->paginate(10);
        $this->movies = Movie::where('title', 'like', '%' . $this->search . '%')->get();
        return view('livewire.movies');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->movie_id = '';
        $this->mid = '';
        $this->title = '';
        $this->description = '';
        $this->release_date = '';
    }

    public function store()
    {
        $this->validate([
            'mid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'release_date' => 'required|date',
        ]);

        Movie::updateOrCreate(['id' => $this->movie_id], [
            'mid' => $this->mid,
            'title' => $this->title,
            'description' => $this->description,
            'release_date' => $this->release_date,
        ]);

        session()->flash('message',
            $this->movie_id ? 'Movie Updated Successfully.' : 'Movie Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $this->movie_id = $id;
        $this->mid = $movie->mid;
        $this->title = $movie->title;
        $this->description = $movie->description;
        $this->release_date = $movie->release_date;

        $this->openModal();
    }

    public function delete($id)
    {
        Movie::find($id)->delete();
        session()->flash('message', 'Movie Deleted Successfully.');
    }
}
