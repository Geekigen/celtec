<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use App\Models\LocationPrice;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
    $location = LocationPrice::all();
    $data = $request->session()->all();
    $sessionId = $request->session()->getId();
    foreach ($data['cart'] as $cart) {
    
$wish=new Wishlist();
$wish->user_id=Auth::user()->id;
$wish->cart_id=$sessionId;
$wish->product_id=$cart['id'];
$wish->save();
} 

return view('checkout',compact('location'));
}


public function order(Request $request)
{
    $this->validate($request, [
        'location'=>'Required|string',
        'number' =>'Required| min:10|max:13',
        'name'=>'Required|string'
        ]);
        $selectedLocationId=$request->input('location');
        $selectedLocation = LocationPrice::findOrFail($selectedLocationId);
        $data = $request->session()->all();
        $total = 0;

        foreach ($data['cart'] as $item) {
            $quantity = $item['quantity'];
            $price = $item['price'];
        
            $subtotal = $quantity * $price;
            $total += $subtotal;
        }
        $sessionId = $request->session()->getId();
        
        $order = new Order();
        $order->cart_id = $sessionId;
        $order->user_id = Auth::user()->id;
        $order->order_array = json_encode($data['cart']);
        $order->official_name = $request->input('name');
        $order->location = $selectedLocation->location;
        $order->phone_number = $request->input('number');
        $order->delivery_fee = $selectedLocation->price; // Set the delivery fee to 0 for now, you can modify this based on your business logic
        $order->total = $total + $selectedLocation->price; // Calculate the total based on price and quantity
        $order->pay_status = 0; 
        $order->status = 'pending'; // Set the status to 'pending' for now, you can modify this based on your business logic
        
        $order->save();
          // Send email to the user
    $user = Auth::user();
    Mail::to($user->email)->send(new OrderPlaced($order));
    
    // Send email to the admin
    $adminEmail = 'kigencaleb50@gmail.com'; // Replace with the admin's email address
    Mail::to($adminEmail)->send(new OrderPlaced($order));
        
        $request->session()->forget('cart');
        
        return redirect('/')->with('status', __('Thank you for your purchase'));
    }

}
