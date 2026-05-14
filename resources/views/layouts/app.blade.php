<!DOCTYPE html>
<html>
<head>
    <title>Skincare Product System</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans overflow-hidden">

<!-- MAIN WRAPPER -->
<div class="h-screen flex flex-col">

    <!-- NAVBAR -->
    <nav class="bg-gradient-to-r from-pink-500 to-gray-500 p-4 text-white shadow-md flex items-center justify-between">

        <!-- LEFT -->
        <div class="flex items-center gap-3">

            <!-- MOBILE MENU BUTTON -->
            <button id="menuBtn"
                    class="md:hidden bg-white text-pink-500 px-3 py-1 rounded shadow">
                ☰
            </button>

            <!-- LOGO -->
            <img src="{{ asset('images/logo.png') }}"
                 alt="Logo"
                 class="w-10 h-10 rounded-full bg-white p-1 shadow">

        </div>

        <!-- TITLE -->
        <h1 class="text-sm sm:text-lg md:text-2xl font-bold tracking-wide text-center">
            Skincare Management System
        </h1>

        <div class="w-10"></div>

    </nav>

    <!-- BODY -->
    <div class="flex flex-1 overflow-hidden">

        <!-- SIDEBAR -->
        <aside id="sidebar"
               class="fixed md:static top-0 left-[-100%] md:left-0 z-50
                      w-64 h-full bg-pink-500 text-white p-6
                      transition-all duration-300 overflow-y-auto">

            <!-- CLOSE BUTTON MOBILE -->
            <div class="flex justify-end md:hidden mb-4">
                <button id="closeBtn"
                        class="bg-white text-pink-500 px-3 py-1 rounded">
                    ✕
                </button>
            </div>

            <!-- DASHBOARD -->
            <a href="{{ route('dashboard') }}"
               class="block bg-gray-500 hover:bg-pink-600 px-4 py-3 rounded font-semibold mb-4">
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
                <li>
                    <a href="{{ route('customers.index') }}"
                       class="block bg-gray-500 hover:bg-pink-600 px-4 py-3 rounded">
                        👥 Customers
                    </a>
                </li>

            </ul>

        </aside>

        <!-- OVERLAY -->
        <div id="overlay"
             class="fixed inset-0 bg-black/40 hidden md:hidden z-40">
        </div>

        <!-- CONTENT -->
        <main class="flex-1 p-4 md:p-6 overflow-y-auto">

            @yield('content')

        </main>

    </div>

</div>

<!-- SCRIPT -->
<script>

    const menuBtn = document.getElementById('menuBtn');
    const closeBtn = document.getElementById('closeBtn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    menuBtn.addEventListener('click', () => {
        sidebar.classList.remove('left-[-100%]');
        sidebar.classList.add('left-0');
        overlay.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    function closeMenu() {
        sidebar.classList.remove('left-0');
        sidebar.classList.add('left-[-100%]');
        overlay.classList.add('hidden');
    }

</script>

</body>
</html>
