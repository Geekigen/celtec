<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ClientOrderController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id; // Assuming you're using Laravel's authentication
        $orders = Order::where('user_id', $user_id)->get();
    
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
{
    // Add any additional logic you need for the show method
    
    // Assuming you have a view file called 'order.show' to display the order details
    return view('orders.show', compact('order'));
}
}
