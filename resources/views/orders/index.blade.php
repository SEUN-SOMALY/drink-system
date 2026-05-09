@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">🛒 Order Products</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- ORDER FORM -->
    <form method="POST" action="{{ route('orders.store') }}" class="mb-6">
        @csrf

        <!-- CUSTOMER NAME -->
        <input type="text" name="customer_name"
               placeholder="Customer Name"
               class="border p-2 w-full mb-2 rounded">

        <!-- PRODUCT -->
        <select name="product_id" class="border p-2 w-full mb-2">
            <option value="">Select Product</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->name }} (${{ $product->price }})
                </option>
            @endforeach
        </select>

        <!-- QUANTITY -->
        <input type="number" name="quantity"
               placeholder="Quantity"
               class="border p-2 w-full mb-2 rounded">

        <button class="bg-pink-500 text-white px-4 py-2 rounded">
            Place Order
        </button>
    </form>

    <!-- ORDER LIST (SCROLLABLE) -->
<!-- ORDER LIST (SCROLLABLE FIXED) -->
<div class="border rounded">

    <div class="max-h-80 overflow-y-auto">

        <table class="w-full">

            <thead class="bg-gray-200 sticky top-0 z-10">
                <tr>
                    <th class="p-2">Customer</th>
                    <th class="p-2">Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
            @foreach($orders as $order)
                <tr class="text-center border-t">

                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->quantity }}</td>

                    <td>${{ $order->product->price }}</td>

                    <td>
                        ${{ $order->product->price * $order->quantity }}
                    </td>

                    <td>${{ $order->total_price }}</td>

                </tr>
            @endforeach
            </tbody>

        </table>

    </div>


</div>

@endsection
