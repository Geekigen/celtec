<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
{
    $product = Product::findOrFail($id); // Use the Product model instead of "product"

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->title, // Access the title property instead of name
            "id" => $product->id,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->images->first()->filename, // Access the first image's filename
            "seller" => $product->user_id
        ];
    }

    session()->put('cart', $cart);
    return redirect()->back(); // Use the redirect() function instead of Redirect::back()
}
public function update(Request $request)
{
    if($request->id && $request->quantity){
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);
        session()->flash('success', __('Cart updated successfully'));
    }
}

public function remove(Request $request)
{
    if($request->id) {
        $cart = session()->get('cart');
        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        session()->flash('success', __('Product removed successfully'));
    }
}

public function wishlist(Request $request)
{

    $data = $request->session()->all();
    $sessionId = $request->session()->getId();
    foreach ($data['cart'] as $cart) {
    
$wish=new Wishlist();
$wish->user_id=Auth::user()->id;
$wish->cart_id=$sessionId;
$wish->product_id=$cart['id'];
$wish->save();
} 

return view('checkout');
}

}
