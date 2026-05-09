@extends('layouts.app')

@section('content')

<div class="bg-white p-5 shadow rounded max-w-xl mx-auto">

    <h2 class="text-2xl font-bold mb-2">Edit Drink</h2>

    <p class="text-gray-600 mb-4">
        Please update the drink information carefully. Make sure:
        <br>• Name should be a valid drink name (e.g. Coca Cola)
        <br>• Price must be a number (e.g. 1.50)
        <br>• Stock must be an integer (e.g. 10)
    </p>

    <form method="POST" action="{{ route('drinks.update', $drink->id) }}">
        @csrf
        @method('PUT')

        <!-- NAME -->
        <label class="font-semibold">Drink Name</label>
        <input type="text" name="name"
               value="{{ $drink->name }}"
               class="border p-2 w-full mb-1 rounded"
               placeholder="Enter drink name">

        <p class="text-sm text-gray-500 mb-3">
            Example: Pepsi, Coca Cola, Sprite
        </p>

        <!-- PRICE -->
        <label class="font-semibold">Price ($)</label>
        <input type="number" step="0.01" name="price"
               value="{{ $drink->price }}"
               class="border p-2 w-full mb-1 rounded"
               placeholder="Enter price">

        <p class="text-sm text-gray-500 mb-3">
            Example: 1.00, 1.50, 2.00
        </p>

        <!-- STOCK -->
        <label class="font-semibold">Stock Quantity</label>
        <input type="number" name="stock"
               value="{{ $drink->stock }}"
               class="border p-2 w-full mb-1 rounded"
               placeholder="Enter stock quantity">

        <p class="text-sm text-gray-500 mb-4">
            Example: 10, 50, 100
        </p>

        <!-- BUTTON -->
        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded w-full">
            Update Drink
        </button>

    </form>
</div>

@endsection
