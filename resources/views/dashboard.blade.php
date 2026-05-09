@extends('layouts.app')

@section('content')

<div class="flex -ml-20">

    <!-- Sidebar -->
    <div class="w-64 bg-blue-700 text-white p-10 h-[80vh]">

    <h2 class="text-2xl font-bold mb-8">
        Dashboard
    </h2>

    <ul class="space-y-5">

        <li>
            <a href="{{ route('drinks.index') }}"
               class="block bg-blue-500 hover:bg-blue-600 px-4 py-5 rounded">
                🍹 Manage Drinks
            </a>
        </li>

        <li>
            <a href="#"
               class="block bg-blue-500 hover:bg-blue-600 px-4 py-5 rounded">
                🛒 Order Drink
            </a>
        </li>

    </ul>

    </div>
    <!-- Main Content -->
    <div class="flex-1 px-10 bg-gray-100">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            <div class="h-20 bg-white p-2 shadow rounded">
                <h2 class="text-gray-500">Total Drinks</h2>
                <p class="text-3xl font-bold">{{ $totalDrinks }}</p>
            </div>

            <div class="h-20 bg-white p-2 shadow rounded">
                <h2 class="text-gray-500">Total Stock</h2>
                <p class="text-3xl font-bold">{{ $totalStock }}</p>
            </div>

            <div class="h-20 bg-white p-2 shadow rounded">
                <h2 class="text-gray-500">Low Stock</h2>
                <p class="text-3xl font-bold text-red-500">{{ $lowStock }}</p>
            </div>

        </div>

    </div>

</div>

@endsection
