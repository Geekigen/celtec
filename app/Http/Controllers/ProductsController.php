<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $categories = Category::all();
        $products =Product::all();
        return view('products.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function sort($categoryId)
    {
        $categories = Category::all();
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)->get();;

        return view('products.sort', compact('category', 'products','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
    if (!$product) {
        // Handle case when the product is not found
        abort(404);
    }
    $similarProducts = Product::where('category_id', $product->category_id)
    ->where('id', '!=', $product->id)
    ->get();

    return view('products.show', compact('product','similarProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
