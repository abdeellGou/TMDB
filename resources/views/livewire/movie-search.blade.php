
<div class="container">
    <input
        type="text"
        placeholder="Search for a movie..."
        wire:model.live="searchTerm"
        class="border rounded p-2 mb-4 w-full"
    />

    <h1>Trending Movies</h1>

    <div>
    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://media.themoviedb.org/t/p/w220_and_h330_face{{ $movie->image_url }}" class="card-img-top" alt="{{ $movie->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                    <br>
                    <hr>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $movies->links() }}
    </div>

</div>
