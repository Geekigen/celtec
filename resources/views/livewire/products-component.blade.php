<div>
    <div class="max-w-md mx-auto p-4 border rounded bg-blue-100 {{ $selectedProductId ? 'opacity-50' : '' }}">
        <!-- Rest of the code -->
   <h2>create a new product</h2>
    
    <form wire:submit.prevent="createProduct" class="mb-4 {{ $selectedProductId ? 'opacity-50' : '' }}">
        <input type="text" wire:model="title" placeholder="Enter title" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
    
        <textarea wire:model="description" placeholder="Enter description" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2"></textarea>
        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
    
        <input type="number" wire:model="price" placeholder="Enter price" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
        @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
    
        <input type="number" wire:model="quantity" placeholder="Enter quantity" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
        @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
    
        <label class="flex items-center mb-2">
            <input type="checkbox" wire:model="isFeatured" class="form-checkbox rounded text-blue-500 focus:outline-none" />
            <span class="ml-2 text-sm">Featured</span>
        </label>
    
        <select wire:model="categoryId" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2">
            <option value="">Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('categoryId') <span class="text-red-500">{{ $message }}</span> @enderror
    
        <input type="file" wire:model="images" class="mt-2" multiple />
        @error('images.*') <span class="text-red-500">{{ $message }}</span> @enderror
    
        <!-- Display image previews -->
        <div class="flex mt-2">
            @if ($images)
                @foreach ($images as $image)
                    <div class="mr-2">
                        <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" class="w-20 h-20 object-cover">
                    </div>
                @endforeach
            @endif
        </div>
    
        <button type="submit" class="rounded-md px-4 py-2 bg-blue-500 text-white focus:outline-none">Add Product</button>
    </form>
    

    <hr class="my-4">
</div>
<style>
    .table-wrapper {
    width: 100%;
    overflow-x: auto;
}

</style>
<div class="table-wrapper">
    <h2 class="text-lg font-semibold text-center mt-4 mb-6 bg-yellow-400 py-2 px-4 rounded-md text-black">Products</h2>
    <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-500">Title</th>
                        <th class="border-b-2 border-gray-500">Description</th>
                        <th class="border-b-2 border-gray-500">Price</th>
                        <th class="border-b-2 border-gray-500">Quantity</th>
                        <th class="border-b-2 border-gray-500">Featured</th>
                        <th class="border-b-2 border-gray-500">Category</th>
                        <th class="border-b-2 border-gray-500">Image</th>
                        <th class="border-b-2 border-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->is_featured ? 'Yes' : 'No' }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                @if ($product->images->count() > 0)
                                    <img src="{{ asset('images/' . $product->images[0]->filename) }}" alt="Product Image" class="w-16 h-16 object-cover">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <button wire:click="editProduct({{ $product->id }})" class="rounded-md px-3 py-1 bg-blue-500 text-white focus:outline-none">Edit</button>
                                <button wire:click="deleteProduct({{ $product->id }})" class="ml-2 rounded-md px-3 py-1 bg-red-500 text-white focus:outline-none">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
    @if ($selectedProductId)
        <h2 class="text-lg font-semibold mt-4">Edit Product</h2>
        <form wire:submit.prevent="updateProduct">
            <input type="text" wire:model="title" placeholder="Enter updated title" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror

            <textarea wire:model="description" placeholder="Enter updated description" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror

            <input type="number" wire:model="price" placeholder="Enter updated price" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
            @error('price') <span class="text-red-500">{{ $message }}</span> @enderror

            <input type="number" wire:model="quantity" placeholder="Enter updated quantity" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
            @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror

            <label class="flex items-center mb-2">
                <input type="checkbox" wire:model="isFeatured" class="form-checkbox rounded text-blue-500 focus:outline-none" />
                <span class="ml-2 text-sm">Featured</span>
            </label>

            <select wire:model="categoryId" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2">
                <option value="">Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categoryId') <span class="text-red-500">{{ $message }}</span> @enderror

            <input type="file" wire:model="images" class="mt-2" multiple accept="image/*" />
        @error('images.*') <span class="text-red-500">{{ $message }}</span> @enderror

        <!-- Image previews for selected product -->
        <div class="flex mt-2">
            @if ($selectedProduct && $selectedProduct->images)
                @foreach ($selectedProduct->images as $image)
                    <div class="mr-2">
                        <img src="{{ asset('images/' . $image->filename) }}" alt="Image Preview" class="w-20 h-20 object-cover">
                    </div>
                @endforeach
            @endif
        </div>

            <button type="submit" class="rounded-md px-4 py-2 bg-blue-500 text-white focus:outline-none">Update Product</button>
        </form>
    @endif
</div>
