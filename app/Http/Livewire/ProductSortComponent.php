<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ProductSortComponent extends Component
{
   
    public $category;
    public $products;

    public function mount()
    {
        $this->category = Category::first(); // Set the default category to the first one
        $this->products = $this->getProductsByCategory($this->category->id);
    }

    public function getProductsByCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return $category->products;
    }

    public function sortByCategory($categoryId)
    {
        $this->category = Category::findOrFail($categoryId);
        $this->products = $this->getProductsByCategory($this->category->id);
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.product-sort-component', [
            'categories' => $categories,
        ]);
    }
}
