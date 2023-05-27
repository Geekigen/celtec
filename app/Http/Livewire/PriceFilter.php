<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class PriceFilter extends Component
{
    public $minPrice;
    public $maxPrice;

    public function render()
    {
        // Retrieve the filtered products based on the price range
        $products = Product::whereBetween('price', [$this->minPrice, $this->maxPrice])
            ->take(16)
            ->get();

        return view('livewire.price-filter', compact('products'));
    }
}
