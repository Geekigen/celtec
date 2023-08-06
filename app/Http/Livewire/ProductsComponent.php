<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $quantity;
    public $isFeatured;
    public $categoryId;
    public $size;
    public $ram;
    public $color;
    public $storageType;
    public $processor;
    public $cores;
    public $selectedProductId;
    public $images = [];
    

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'isFeatured' => 'nullable|boolean', // 'nullable' makes the field optional
        'categoryId' => 'required|exists:categories,id',
        'size' => 'string',
        'ram' => 'string',
        'color' => 'string',
        'storageType' => 'string',
        'processor' => 'string',
        'cores' => 'string',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:200048',
    ];
    
    

    public function render()
    {
        $products = Product::all();
        $categories = Category::all();
        $selectedProduct = Product::find($this->selectedProductId);

        return view('livewire.products-component', compact('products', 'categories', 'selectedProduct'));
    }

    public function createProduct()
    {
        $this->validate();

        $product = Product::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'is_featured' => $this->isFeatured,
            'category_id' => $this->categoryId,
            'size' => $this->size,
            'ram' => $this->ram,
            'color' => $this->color,
            'storage_type' => $this->storageType,
            'processor' => $this->processor,
            'cores' => $this->cores,
        ]);
        
        $this->uploadImages($product);

        $this->resetInput();
    }
    public function editProduct($productId)
    {
        $this->selectedProductId = $productId;
        $product = Product::find($productId);
    
        if ($product) {
            $this->title = $product->title;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->quantity = $product->quantity;
            $this->isFeatured = $product->is_featured;
            $this->categoryId = $product->category_id;
            $this->size = $product->size;
            $this->ram = $product->ram;
            $this->color = $product->color;
            $this->storageType = $product->storage_type;
            $this->processor = $product->processor;
            $this->cores = $product->cores;
        }
    }
    

    public function updateProduct()
    {
        $this->validate();

        $product = Product::find($this->selectedProductId);

        if ($product) {
            $product->update([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'is_featured' => $this->isFeatured,
                'category_id' => $this->categoryId,
                'size' => $this->size,
                'ram' => $this->ram,
                'color' => $this->color,
                'storage_type' => $this->storageType,
                'processor' => $this->processor,
                'cores' => $this->cores,
            ]);
        
            $this->uploadImages($product);
        
            $this->resetInput();
        }
        
    }

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            $product->delete();
        }
    }

    private function resetInput()
    {
        $this->title = '';
        $this->description = '';
        $this->price = null;
        $this->quantity = null;
        $this->isFeatured = false;
        $this->categoryId = null;
        $this->selectedProductId = null;
        $this->images = [];
        $this->size = '';
        $this->ram = '';
        $this->color = '';
        $this->storageType = '';
        $this->processor = '';
        $this->cores = '';
    }
    

    private function uploadImages($product)
    {
        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                // $image_name = time() . '.' . $image->getClientOriginalExtension();
                // $destinationPath = './public/images';
                
                // $image->move($destinationPath, $image_name);
                
                // $filename = 'product-images/' . $image_name;
                $filename = $image->store('product-images', 'public_images');
                $product->images()->create([
                    'filename' => $filename,
                ]);
            }
        }
    }
    
    
}
