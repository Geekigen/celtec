<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProducts(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $products = Product::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->get();
        
        return view('welcome', compact('products'));
    }
}
