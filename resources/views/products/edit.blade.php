@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 shadow rounded-xl">

    <h2 class="text-2xl font-bold text-pink-600 mb-4">
        ✨ Edit Product
    </h2>

    <form method="POST" action="{{ route('products.update', $product->id) }}">

        @csrf
        @method('PUT')

        <!-- NAME -->
        <input type="text" name="name"
               value="{{ $product->name }}"
               class="border p-2 w-full mb-2">

        <!-- PRICE -->
        <input type="number" name="price"
               value="{{ $product->price }}"
               class="border p-2 w-full mb-2">

        <!-- STOCK -->
        <input type="number" name="stock"
               value="{{ $product->stock }}"
               class="border p-2 w-full mb-2">

        <!-- DESCRIPTION -->
        <div class="mb-2">
            <label class="text-sm font-medium text-gray-700">Description</label>
            <textarea name="description"
                      class="border p-2 w-full rounded-lg">{{ $product->description }}</textarea>
        </div>

        <!-- CATEGORY -->
        <input type="text" name="category"
               value="{{ $product->category }}"
               class="border p-2 w-full mb-2"
               placeholder="Category">

        <!-- IMAGE (FIXED) -->
        <input type="url" name="image"
               value="{{ $product->image }}"
               class="border p-2 w-full mb-2"
               placeholder="Image URL">

        <button class="bg-pink-500 text-white px-4 py-2 w-full rounded">
            Update
        </button>

    </form>

</div>

@endsection
