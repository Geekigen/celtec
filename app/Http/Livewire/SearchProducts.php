<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $searchTerm;

    public function render()
    {
        $products = Product::where('title', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
            ->get();

        return view('livewire.search-products', [
            'products' => $products
        ]);
    }
}
