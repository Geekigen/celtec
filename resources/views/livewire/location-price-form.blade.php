<!-- resources/views/livewire/location-price-form.blade.php -->

<div>
    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-4 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form @if($editMode) wire:submit.prevent="update" @else wire:submit.prevent="save" @endif class="max-w-sm mx-auto">
        <div class="mb-4">
            <label for="location" class="block mb-2 font-bold">Location:</label>
            <input type="text" wire:model="location" id="location" class="w-full px-4 py-2 border border-gray-300 rounded">
            @error('location') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block mb-2 font-bold">Price:</label>
            <input type="number" wire:model="price" id="price" class="w-full px-4 py-2 border border-gray-300 rounded">
            @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="text-right">
            @if($editMode)
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                <button wire:click="resetForm" type="button" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</button>
            @else
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
            @endif
        </div>
    </form>

    <table class="mt-8 w-full">
        <thead>
            <tr>
                <th class="py-2">Location</th>
                <th class="py-2">Price</th>
                <th class="py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locationPrices as $item)
                <tr>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <button wire:click="edit({{ $item->id }})" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                        <button wire:click="delete({{ $item->id }})" class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
