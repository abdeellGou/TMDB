<div class="container">
    <h1 class="text-2xl font-bold mb-4">Movies List</h1>

    <button wire:click="$emit('showCreateForm')" class="bg-blue-500 text-white p-2 mb-4">Add New Movie</button>

    <input type="text" wire:model.live="search" placeholder="Search movies..." class="border p-2 mb-4 w-full" />

    <div class="mt-4">

            <ul>
                @foreach ($movies as $movie)
                    <li class="border-b p-2 flex justify-between items-center">
                        <a href="{{ route('movies.show', $movie->id) }}" class="text-blue-600">
                            {{ $movie->title }} ({{ $movie->release_date }})
                        </a>
                        <div>
                            <button wire:click="$emit('showEditForm', {{ $movie->id }})" class="bg-yellow-500 text-white p-1">Edit</button>
                            <button wire:click="deleteMovie({{ $movie->id }})" class="bg-red-500 text-white p-1">Delete</button>
                        </div>
                    </li>
                @endforeach
            </ul>
    </div>
    <div class="d-flex justify-content-center">
        {{ $movies->links() }}
    </div>

</div>
