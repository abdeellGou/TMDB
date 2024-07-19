<div>
    <div x-data="{ showForm: false }" @show-form.window="showForm = true" @hide-form.window="showForm = false">
        <div x-show="showForm" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white p-6 rounded shadow-lg">
                <h2 class="text-2xl mb-4">{{ $movieId ? 'Edit Movie' : 'Add New Movie' }}</h2>
                <form wire:submit.prevent="saveMovie">
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" wire:model="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" wire:model="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
                        <input type="date" id="release_date" wire:model="release_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('release_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="button" @click="showForm = false" class="bg-gray-500 text-white p-2 mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white p-2">{{ $movieId ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
