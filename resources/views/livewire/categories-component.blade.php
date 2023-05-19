<div class="max-w-md mx-auto p-4 border rounded bg-blue-100">
    <form wire:submit.prevent="createCategory" class="mb-4">
        <div class="flex items-center">
            <input type="text" wire:model="name" placeholder="Enter category name" class="rounded-l-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <button type="submit" class="rounded-r-md px-4 py-2 bg-blue-500 text-white focus:outline-none">Add Category</button>
        </div>
        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
    </form>

    <hr class="my-4">

    <h2 class="text-lg font-semibold">Categories</h2>
    <ul>
        @foreach ($categories as $category)
            <li class="flex items-center mb-2">
                <span>{{ $category->name }}</span>
                <button wire:click="editCategory({{ $category->id }})" class="ml-2 rounded-md px-3 py-1 bg-blue-500 text-white focus:outline-none">Edit</button>
                <button wire:click="deleteCategory({{ $category->id }})" class="ml-2 rounded-md px-3 py-1 bg-red-500 text-white focus:outline-none">Delete</button>
            </li>
        @endforeach
    </ul>

    @if ($selectedCategory)
        <h2 class="text-lg font-semibold mt-4">Edit Category</h2>
        <form wire:submit.prevent="updateCategory">
            <div class="flex items-center">
                <input type="text" wire:model="name" placeholder="Enter updated category name" class="rounded-l-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <button type="submit" class="rounded-r-md px-4 py-2 bg-blue-500 text-white focus:outline-none">Update Category</button>
            </div>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </form>
    @endif
</div>
