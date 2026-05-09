@extends('layouts.app')

@section('content')

<div class="bg-gray-100 h-full w-full">

    <h1 class="text-2xl font-bold mb-6">Overview</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        <!-- Total Products -->
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500">Total Products</h2>
            <p class="text-3xl font-bold">{{ $totalProducts }}</p>
        </div>

        <!-- Total Stock -->
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500">Total Stock</h2>
            <p class="text-3xl font-bold">{{ $totalStock }}</p>
        </div>

        <!-- Low Stock -->
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500">Low Stock</h2>
            <p class="text-3xl font-bold text-red-500">{{ $lowStock }}</p>
        </div>

    </div>

</div>

@endsection
