@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-pink-50 via-purple-50 to-blue-50 p-6">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">🌸 Skincare Dashboard</h1>
        <p class="text-gray-600">Manage your beauty products with style ✨</p>
    </div>

    <!-- STATS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- TOTAL PRODUCTS -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-pink-500 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Total Products</p>
                    <h2 class="text-3xl font-bold text-pink-600">{{ $totalProducts }}</h2>
                </div>
                <div class="text-pink-500 text-4xl">🧴</div>
            </div>
        </div>

        <!-- TOTAL STOCK -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Total Stock</p>
                    <h2 class="text-3xl font-bold text-blue-600">{{ $totalStock }}</h2>
                </div>
                <div class="text-blue-500 text-4xl">📦</div>
            </div>
        </div>

        <!-- LOW STOCK -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-red-500 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">Low Stock</p>
                    <h2 class="text-3xl font-bold text-red-600">{{ $lowStock }}</h2>
                </div>
                <div class="text-red-500 text-4xl">⚠️</div>
            </div>
        </div>

    </div>

    <!-- EXTRA SECTION -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- STATUS -->
        <div class="bg-white rounded-xl shadow p-6 border-t-4 border-green-400">
            <h3 class="text-lg font-semibold text-gray-800">System Status</h3>
            <p class="text-gray-500 mt-2">All skincare inventory systems are running smoothly 💚</p>

            <div class="mt-4">
                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">
                    Online
                </span>
            </div>
        </div>

        <!-- QUICK ACTION -->
        <div class="bg-white rounded-xl shadow p-6 border-t-4 border-purple-400">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>

            <div class="flex flex-wrap gap-3">

                <a href="{{ route('products.index') }}"
                   class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
                    🧴 Products
                </a>

                <a href="{{ route('orders.index') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                    🛒 Orders
                </a>

                {{-- <a href="#"
                   class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition">
                    📊 Reports
                </a> --}}

            </div>

        </div>

    </div>

</div>

@endsection
