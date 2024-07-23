<div class="p-6 bg-gray-100 rounded-lg shadow-lg">
    <div>
        <input type="text" wire:model.live="search" placeholder="Search movies..." class="mb-4 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <!-- <label for="countries" class="mb-4 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">Select an option</label> -->
        <!-- <select id="countries" wire:model.live="filter" class="mb-4 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"">
            <option selected value="Daily">Daily</option>
            <option value="Monthly">Monthly</option>
        </select> -->
    </div>
    <button wire:click="create()" class="mb-4 bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Create New Movie</button>

    @if($isOpen)
        @include('livewire.create')
    @endif

    <table class="table-auto w-full bg-white rounded-lg shadow-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border-b">ID</th>
                <th class="p-2 border-b">MID</th>
                <th class="p-2 border-b">Title</th>
                <th class="p-2 border-b">Description</th>
                <th class="p-2 border-b">Release Date</th>
                <th class="p-2 border-b">Show</th>
                <th class="p-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr class="hover:bg-gray-100">
                    <td class="p-2 border-b">{{ $movie->id }}</td>
                    <td class="p-2 border-b">{{ $movie->mid }}</td>
                    <td class="p-2 border-b">{{ $movie->title }}</td>
                    <td class="p-2 border-b">{{ Str::limit($movie->description, 100) }}</td>
                    <td class="p-2 border-b">{{ $movie->release_date }}</td>
                    <td class="p-2 border-b">
                        <a href="{{ route('movies.show', $movie->id) }}" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Show</a>
                    </td>
                    <td class="p-2 border-b">
                        <button wire:click="edit({{ $movie->id }})" class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600">Edit</button>
                        <button wire:click="delete({{ $movie->id }})" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $movies->links() }}
    </div>
</div>
