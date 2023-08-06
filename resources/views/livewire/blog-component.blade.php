<div>
    <form wire:submit.prevent="{{ $isEditing ? 'updateBlog' : 'saveBlog' }}" class="mb-4">
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title:</label>
            <input type="text" id="title" wire:model.defer="title" class="form-input mt-1 block w-full">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700">Content:</label>
            <textarea id="content" wire:model.defer="content" class="form-textarea mt-1 block w-full"></textarea>
            @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4"   wire:ignore>
            <label for="image" class="block text-gray-700">Image:</label>
            <input type="file" id="image" wire:model="image" class="form-input mt-1 block w-full">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" style="max-width: 200px;">
            @elseif ($isEditing && $selectedBlog->image)
                <img src="{{ asset('storage/' . $selectedBlog->image) }}" alt="Image Preview" style="max-width: 200px;">
            @endif
            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ $isEditing ? 'Update' : 'Save' }}</button>
        <button type="button" wire:click="resetForm" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Reset</button>
    </form>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Content</th>
                <th class="px-4 py-2">Image</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td class="border px-4 py-2">{{ $blog->title }}</td>
                    <td class="border px-4 py-2">{{ $blog->content }}</td>
                    <td class="border px-4 py-2">
                        @if ($blog->image)
                            <img src="{{ asset('images/' . $blog->image) }}" alt="Blog Image" style="max-width: 100px;">
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <button wire:click="editBlog({{ $blog->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                        <button wire:click="deleteBlog({{ $blog->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    

    <script>
         ClassicEditor
           .create(document.querySelector('#content'))
           .then(editor => {
               editor.model.document.on('change:data', () => {
               @this.set('content', editor.getData());
              })
           })
           .catch(error => {
              console.error(error);
           });
    </script>
</div>
