<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProducts(Request $request)
    {
        $keyword = $request->input('keyword');
        $categories = Category::paginate('3');
        $empty="No product found!!";
        $products = Product::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->paginate('4');
        
        return view('search', compact('products','categories','empty'));
    }
}
