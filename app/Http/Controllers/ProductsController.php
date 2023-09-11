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
    {   $categories = Category::paginate('3');
        $products =Product::paginate('40');
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
    $categories = Category::get();
    $similarProducts = Product::where('category_id', $product->category_id)
    ->where('id', '!=', $product->id)
    ->get();

    return view('products.show', compact('product','similarProducts','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Product =Product::findOrFail($id);
        return view('products.edit', compact('Product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('filename')) {
        $images = $request->file('filename');

        foreach ($images as $image) {
            $image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('filename'), $image_name);
            $validatedData['filename'][] = $image_name;

            $product->images()->create([
                'filename' => $image_name,
            ]);
        }
    }

    return redirect('/admin');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
