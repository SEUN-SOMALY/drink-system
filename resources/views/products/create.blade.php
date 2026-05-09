@extends('layouts.app')

@section('content')

<div class="max-w-lg mx-auto bg-white p-6 shadow rounded-xl">

    <h2 class="text-2xl font-bold text-pink-600 mb-4">
        🧴 Add Product
    </h2>

    <form method="POST" action="{{ route('products.store') }}" class="space-y-3">

        @csrf

        <!-- NAME -->
        <input type="text" name="name"
               placeholder="Name"
               class="border p-2 w-full rounded">

        <!-- DESCRIPTION -->
        <textarea name="description"
                  placeholder="Description"
                  class="border p-2 w-full rounded"></textarea>

        <!-- PRICE -->
        <input type="number" name="price"
               placeholder="Price"
               class="border p-2 w-full rounded">

        <!-- STOCK -->
        <input type="number" name="stock"
               placeholder="Stock"
               class="border p-2 w-full rounded">

        <!-- CATEGORY -->
        <input type="text" name="category"
               placeholder="Category (e.g. serum, cleanser)"
               class="border p-2 w-full rounded">

        <!-- IMAGE -->
        <input type="url" name="image"
               placeholder="Image URL (https://...)"
               class="border p-2 w-full rounded">

        <!-- BUTTON -->
        <button class="bg-pink-500 text-white px-4 py-2 rounded w-full">
            Save Product
        </button>

    </form>

</div>

@endsection
