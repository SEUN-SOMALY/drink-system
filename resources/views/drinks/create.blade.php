<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink Management | Add New</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

<div class="p-6 bg-gray-50 min-h-screen flex justify-center items-start">
    <div class="w-full max-w-md bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <h2 class="text-xl font-bold text-gray-800">Add New Drink</h2>
            <p class="text-sm text-gray-500">Enter the details to add a new item to inventory.</p>
        </div>

        <form action="{{ route('drinks.store') }}" method="POST" class="p-6 space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Drink Name</label>
                <input type="text" name="name" id="name" placeholder="e.g. Ice Cola" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-gray-700">
                @error('name')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Price ($)</label>
                    <input type="number" step="0.01" name="price" id="price" placeholder="0.00" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-gray-700">
                    @error('price')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="stock" class="block text-sm font-semibold text-gray-700 mb-1">Initial Stock</label>
                    <input type="number" name="stock" id="stock" placeholder="0" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-gray-700">
                    @error('stock')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-2">
                <a href="{{ route('drinks.index') }}"
                   class="px-4 py-2 text-sm font-semibold text-red-600 hover:bg-red-50 rounded-lg transition duration-200">
                   Cancel
                </a>

                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-md transition duration-200 active:scale-95">
                    Save Drink
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
