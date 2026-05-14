@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">🛒 Order Products</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- SEARCH -->
    <form method="GET" class="mb-4 flex gap-2">
        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Search customer or product..."
               class="border p-2 w-full rounded">

        <button class="bg-gray-700 text-white px-4 rounded">
            Search
        </button>
    </form>

    <!-- CREATE -->
    <form method="POST" action="{{ route('orders.store') }}" class="mb-6">
        @csrf

        <input type="text" name="customer_name"
               placeholder="Customer Name"
               class="border p-2 w-full mb-2 rounded">

        <select name="product_id" class="border p-2 w-full mb-2">
            <option value="">Select Product</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->name }} (${{ $product->price }})
                </option>
            @endforeach
        </select>

        <input type="number" name="quantity"
               placeholder="Quantity"
               class="border p-2 w-full mb-2 rounded">

        <button class="bg-pink-500 text-white px-4 py-2 rounded">
            Place Order
        </button>
    </form>

    <!-- TABLE -->
    <div class="border rounded">
        <div class="h-[420px] overflow-y-auto">

            <table class="w-full border-collapse">

                <thead class="bg-gray-200 sticky top-0 z-10">
                    <tr>
                        <th class="p-2">Customer</th>
                        <th class="p-2">Product</th>
                        <th class="p-2">Qty</th>
                        <th class="p-2">Price</th>
                        <th class="p-2">Subtotal</th>
                        <th class="p-2">Total</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)
                        <tr class="text-center border-t">

                            <td class="p-2">{{ $order->customer_name }}</td>
                            <td class="p-2">{{ $order->product->name }}</td>
                            <td class="p-2">{{ $order->quantity }}</td>
                            <td class="p-2">${{ $order->product->price }}</td>
                            <td class="p-2">
                                ${{ $order->product->price * $order->quantity }}
                            </td>
                            <td class="p-2">${{ $order->total_price }}</td>

                            <td class="p-2 flex justify-center gap-2">

                                <a href="{{ route('orders.edit', $order->id) }}"
                                   class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('orders.destroy', $order->id) }}"
                                      onsubmit="return confirm('Delete this order?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                                        Delete
                                    </button>
                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-gray-500">
                                No orders found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
