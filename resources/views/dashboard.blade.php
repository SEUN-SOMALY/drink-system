@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div class="bg-white p-5 shadow rounded">
        <h2 class="text-gray-500">Total Drinks</h2>
        <p class="text-3xl font-bold">{{ $totalDrinks }}</p>
    </div>

    <div class="bg-white p-5 shadow rounded">
        <h2 class="text-gray-500">Total Stock</h2>
        <p class="text-3xl font-bold">{{ $totalStock }}</p>
    </div>

    <div class="bg-white p-5 shadow rounded">
        <h2 class="text-gray-500">Low Stock</h2>
        <p class="text-3xl font-bold text-red-500">{{ $lowStock }}</p>
    </div>

</div>

<div class="mt-6">
    <a href="{{ route('drinks.index') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">
        Manage Drinks →
    </a>
</div>

@endsection
