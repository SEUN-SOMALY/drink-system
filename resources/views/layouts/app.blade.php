<!DOCTYPE html>
<html>
<head>
    <title>Skincare Product System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans h-screen overflow-hidden">

<!-- NAVBAR -->
<nav class="bg-gradient-to-r from-pink-500 to-gray-500 p-4 text-white shadow-md grid grid-cols-3 items-center h-16">

    <!-- Logo -->
    <div class="flex items-center">
        <img src="{{ asset('images/logo.png') }}"
             alt="Logo"
             class="w-10 h-10 rounded-full bg-white p-1 shadow">
    </div>

    <!-- Title -->
    <h1 class="text-center text-xl md:text-2xl font-bold tracking-wide">
        Skincare Management System
    </h1>

    <div></div>

</nav>

<!-- MAIN AREA -->
<div class="flex h-[calc(100vh-64px)]">

    <!-- SIDEBAR -->
    <div class="w-64 bg-pink-500 text-white p-6 space-y-6">

        <!-- DASHBOARD BUTTON -->
        <a href="{{ route('dashboard') }}"
           class="block bg-gray-500 hover:bg-pink-600 px-4 py-3 rounded font-semibold">
            📊 Dashboard
        </a>

        <!-- MENU -->
        <ul class="space-y-4">

            <li>
                <a href="{{ route('products.index') }}"
                   class="block bg-gray-500 hover:bg-pink-600 px-4 py-3 rounded">
                    🧴 Manage Products
                </a>
            </li>

            <li>
                <a href="{{ route('orders.index') }}"
                class="block bg-gray-500 hover:bg-pink-600 px-4 py-3 rounded">
                 🛒 Order Products
             </a>
            </li>

        </ul>

    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-6 overflow-hidden">

        @yield('content')

    </div>

</div>

</body>
</html>
