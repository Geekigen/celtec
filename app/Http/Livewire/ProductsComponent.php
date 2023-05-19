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
    public $selectedProductId;
    public $images = [];

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'isFeatured' => 'boolean',
        'categoryId' => 'required|exists:categories,id',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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
        ]);

        $this->uploadImages($product);

        $this->resetInput();
    }

    public function editProduct($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            $this->selectedProductId = $productId;
            $this->title = $product->title;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->quantity = $product->quantity;
            $this->isFeatured = $product->is_featured;
            $this->categoryId = $product->category_id;
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
