@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-6">

    <!-- TITLE -->
    <h2 class="text-3xl font-bold text-gray-800 mb-4">
        {{ $drink->name }}
    </h2>

    <!-- PRICE BOX -->
    <div class="mb-3">
        <p class="text-gray-500">Price</p>
        <p class="text-xl font-semibold text-green-600">
            ${{ $drink->price }}
        </p>
    </div>

    <!-- STOCK BOX -->
    <div class="mb-5">
        <p class="text-gray-500">Stock Status</p>

        @if($drink->stock > 10)
            <span class="text-xl font-semibold text-green-600">
            {{ $drink->stock }}
            </span>
        @else
            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                Low Stock ({{ $drink->stock }})
            </span>
        @endif
    </div>

    <!-- BACK BUTTON -->
    <a href="{{ route('drinks.index') }}"
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded inline-block">
        ← Back to List
    </a>

</div>

@endsection
