<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AdminOrderComponent extends Component
{

    public $orders;

    protected $rules = [
        'orders.*.status' => 'required',
    ];

    public function mount()
    {
        $this->orders = Order::all();
    }

    public function markAsPaid($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->pay_status = true;
        $order->save();
    }

    public function updateStatus($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status = $this->orders->firstWhere('id', $orderId)['status'];
        $order->save();
    
        session()->flash('success', 'Order status updated successfully.');
    }
    

    public function render()
    {
        return view('livewire.admin-order-component');
    }
}
