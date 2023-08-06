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
            <input type="hidden" name="isFeatured" value="0">
            <input type="checkbox" name="isFeatured" value="1" wire:model="isFeatured" class="form-checkbox rounded text-blue-500 focus:outline-none" />
            <span class="ml-2 text-sm">Featured</span>
        </label>
        
    
        <select wire:model="categoryId" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2">
            <option value="">Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('categoryId') <span class="text-red-500">{{ $message }}</span> @enderror
    
        <input  wire:model="images" class="mt-2" multiple type="hidden" />
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
        <input type="text" wire:model="size" placeholder="Enter size" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
        @error('size') <span class="text-red-500">{{ $message }}</span> @enderror
       
        <input type="text" wire:model="ram" placeholder="Enter ram" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
@error('ram') <span class="text-red-500">{{ $message }}</span> @enderror

<input type="text" wire:model="color" placeholder="Enter color" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
@error('color') <span class="text-red-500">{{ $message }}</span> @enderror

<input type="text" wire:model="storageType" placeholder="Enter storageType" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
@error('storageType') <span class="text-red-500">{{ $message }}</span> @enderror

<input type="text" wire:model="processor" placeholder="Enter processor" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
@error('processor') <span class="text-red-500">{{ $message }}</span> @enderror

    
<input type="text" wire:model="cores" placeholder="Enter cores" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
@error('cores') <span class="text-red-500">{{ $message }}</span> @enderror

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
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Title</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Description</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Price</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Quantity</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Featured</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Category</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Size</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">RAM</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">COLOR</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Storage Type</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Processor</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Cores</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Image</th>
                    <th class="border-b-2 border-gray-500 px-2 py-1">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="border-b px-2 py-1">{{ $product->title }}</td>
                    <td class="border-b px-2 py-1">{{ $product->description }}</td>
                    <td class="border-b px-2 py-1">{{ $product->price }}</td>
                    <td class="border-b px-2 py-1">{{ $product->quantity }}</td>
                    <td class="border-b px-2 py-1">{{ $product->is_featured ? 'Yes' : 'No' }}</td>
                    <td class="border-b px-2 py-1">{{ $product->category->name }}</td>
                    <td class="border-b px-2 py-1">{{ $product->size }}</td>
                    <td class="border-b px-2 py-1">{{ $product->ram }}</td>
                    <td class="border-b px-2 py-1">{{ $product->color }}</td>
                    <td class="border-b px-2 py-1">{{ $product->storage_type }}</td>
                    <td class="border-b px-2 py-1">{{ $product->processor }}</td>
                    <td class="border-b px-2 py-1">{{ $product->cores }}</td>
                    <td class="border-b px-2 py-1">
                        @if ($product->images->count() > 0)
                        <img src="{{ asset('images/' . $product->images[0]->filename) }}" alt="Product Image" class="w-16 h-16 object-cover">
                        @else
                        No Image
                        @endif
                    </td>
                    <td class="border-b px-2 py-1">
                        <button  class="rounded-md px-2 py-1 bg-blue-500 text-white focus:outline-none text-xs"><a href="/products/{{ $product->id }}/edit">Add Image</a></button>
                        <button wire:click="editProduct({{ $product->id }})" class="rounded-md px-2 py-1 bg-blue-500 text-white focus:outline-none text-xs">Edit</button>
                        <button wire:click="deleteProduct({{ $product->id }})" class="ml-2 rounded-md px-2 py-1 bg-red-500 text-white focus:outline-none text-xs">Delete</button>
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
        <input type="text" wire:model="size" placeholder="Enter size" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
        @error('size') <span class="text-red-500">{{ $message }}</span> @enderror
        <input type="text" wire:model="ram" placeholder="Enter ram" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
@error('ram') <span class="text-red-500">{{ $message }}</span> @enderror

<input type="text" wire:model="color" placeholder="Enter color" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
@error('color') <span class="text-red-500">{{ $message }}</span> @enderror

<input type="text" wire:model="storageType" placeholder="Enter storageType" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
@error('storageType') <span class="text-red-500">{{ $message }}</span> @enderror

<input type="text" wire:model="processor" placeholder="Enter processor" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
@error('processor') <span class="text-red-500">{{ $message }}</span> @enderror

    
<input type="text" wire:model="cores" placeholder="Enter cores" class="rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" />
@error('cores') <span class="text-red-500">{{ $message }}</span> @enderror

            <button type="submit" class="rounded-md px-4 py-2 bg-blue-500 text-white focus:outline-none">Update Product</button>
        </form>
    @endif
</div>
