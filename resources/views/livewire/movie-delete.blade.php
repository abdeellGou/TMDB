<div>
    <div class="mb-4">
        <input type="text" class="form-input w-full" placeholder="Search for movies..." wire:model.debounce.500ms="search">
    </div>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($movies as $movie)
            <div class="bg-white rounded-lg shadow-md p-4">
                <a href="{{ route('movies.show', $movie->id) }}">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie->image_url }}" alt="{{ $movie->title }}" class="rounded-md mb-4">
                    <h2 class="text-xl font-semibold">{{ $movie->title }}</h2>
                </a>
                <div class="mt-4">
                    <a href="{{ route('movies.edit', $movie->id) }}" class="text-blue-500">Edit</a>
                    <button wire:click="deleteMovie({{ $movie->id }})" class="text-red-500 ml-2">Delete</button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $movies->links() }}
    </div>
</div>
