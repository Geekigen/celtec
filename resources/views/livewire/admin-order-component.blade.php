<!-- resources/views/livewire/admin-order-component.blade.php -->

<div>
    <h2>All Orders</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Official Name</th>
                <th>Location</th>
                <th>Phone Number</th>
                <th>Delivery Fee</th>
                <th>Total</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $index => $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->official_name }}</td>
                    <td>{{ $order->location }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->delivery_fee }}</td>
                    <td>{{ $order->total }}</td>
                    <td>
                        @if ($order->pay_status)
                            Paid
                        @else
                            <button wire:click="markAsPaid({{ $order->id }})">Mark as Paid</button>
                        @endif
                    </td>
                    <td>
                        <form wire:submit.prevent="updateStatus({{ $order->id }})">
                            <select wire:model="orders.{{ $index }}.status">
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="delivered">Delivered</option>
                            </select>
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">Full details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
