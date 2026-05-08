<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink Management | Edit Drink</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

<div class="p-6 bg-gray-50 min-h-screen flex justify-center items-start">
    <div class="w-full max-w-md bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <h2 class="text-xl font-bold text-gray-800">Edit Drink</h2>
            <p class="text-sm text-gray-500">Update the information for <span class="font-semibold text-blue-600">{{ $drink->name }}</span>.</p>
        </div>

        <form action="{{ route('drinks.update', $drink->id) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Drink Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $drink->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-gray-700">
                @error('name')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Price ($)</label>
                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $drink->price) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-gray-700">
                    @error('price')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="stock" class="block text-sm font-semibold text-gray-700 mb-1">Current Stock</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', $drink->stock) }}"
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
                    class="px-6 py-2 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700 shadow-md transition duration-200 active:scale-95">
                    Update Drink
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
