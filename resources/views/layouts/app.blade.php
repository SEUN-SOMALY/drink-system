<!DOCTYPE html>
<html>
<head>
    <title>Drink System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<nav class="bg-blue-600 p-4 text-white shadow relative">

    <!-- Logo Left -->
    <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
        <img src="{{ asset('images/logo.png') }}"
             alt="Logo"
             class="w-10 h-10 rounded-full bg-white p-1">
    </div>

    <!-- Center Text -->
    <h1 class="text-2xl font-bold text-center">
        Drink Management System
    </h1>

</nav>

<div class="container mx-auto mt-6">
    @yield('content')
</div>

</body>
</html>
