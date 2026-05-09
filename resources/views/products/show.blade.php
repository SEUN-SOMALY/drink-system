@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 shadow rounded-xl">

    <!-- TITLE -->
    <h2 class="text-3xl font-bold text-pink-600 mb-1">
        🧴 {{ $product->name }}
    </h2>

    <!-- CATEGORY -->
    @if($product->category)
        <p class="text-sm text-purple-600 mb-3">
            Category: {{ $product->category }}
        </p>
    @endif

    <!-- IMAGE -->
    @if($product->image)
        <div class="w-full h-56 bg-gray-100 rounded-xl overflow-hidden shadow flex items-center justify-center">
            <img src="{{ $product->image }}"
                 class="w-full h-full object-contain p-2">
        </div>
    @endif

    <!-- DESCRIPTION -->
    <p class="text-gray-700 mt-4 mb-2">
        {{ $product->description }}
    </p>

    <!-- PRICE -->
    <p class="text-green-600 font-bold">
        Price: ${{ $product->price }}
    </p>

    <!-- STOCK -->
    <p class="mb-4">
        Stock:
        @if($product->stock > 10)
            <span class="text-green-600">In Stock</span>
        @else
            <span class="text-red-600">Low Stock</span>
        @endif
    </p>

    <!-- BACK BUTTON -->
    <a href="{{ route('products.index') }}"
       class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg inline-block w-full text-center font-semibold">
        ← Back to Products
    </a>

</div>

@endsection
