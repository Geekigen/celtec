<div>
    <form wire:submit.prevent="uploadImages" enctype="multipart/form-data">
        <div class="mb-4">
            <input type="file" wire:model="images" multiple class="mb-2">
            <div>
                @if ($imagesPreview)
                <div class="flex-col space-y-2">
                    @foreach ($imagesPreview as $index => $image)
                        <div class="flex items-center space-x-2">
                            <img src="{{ $image }}" alt="Preview" class="w-30 h-30 object-cover">
                            <button type="button" wire:click="removeImage({{ $index }})" class="px-1 py-1 bg-red-500 text-white w-18 h-12">Remove</button>
                        </div>
                    @endforeach
                </div>
                
                @endif
            </div>
        </div>
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 hover:text-white focus:outline-none focus:bg-green-600 focus:text-white">
            Upload
          </button>
          
    </form>

    <!-- Display existing images -->
    @if ($existingImages)
        <div class="mt-4">
            @foreach ($existingImages as $existingImage)
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('images/' . $existingImage->filepath) }}" alt="Existing Image" class="w-24 h-24 object-cover">
                        <button type="button" wire:click="deleteImage({{ $existingImage['id'] }})" class="px-2 py-1 bg-red-500 text-white">Delete</button>
                    </div>
                
            @endforeach
        </div>
    @endif
</div>
