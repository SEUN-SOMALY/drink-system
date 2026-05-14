@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">✏️ Edit Order</h1>

    <form method="POST" action="{{ route('orders.update', $order->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="customer_name"
               value="{{ $order->customer_name }}"
               class="border p-2 w-full mb-2 rounded">

        <select name="product_id" class="border p-2 w-full mb-2">
            @foreach($products as $product)
                <option value="{{ $product->id }}"
                    {{ $order->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }} (${{ $product->price }})
                </option>
            @endforeach
        </select>

        <input type="number" name="quantity"
               value="{{ $order->quantity }}"
               class="border p-2 w-full mb-2 rounded">

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            Update Order
        </button>
    </form>

</div>

@endsection
