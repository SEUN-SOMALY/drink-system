<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">

            <!-- Header -->
            <div class="bg-blue-600 px-6 py-5">
                <h1 class="text-2xl font-bold text-white">
                    Drink Details
                </h1>
            </div>

            <!-- Content -->
            <div class="p-6 space-y-5">

                <div>
                    <label class="block text-sm font-semibold text-gray-500 mb-1">
                        Drink ID
                    </label>

                    <div class="w-full px-4 py-3 bg-gray-50 rounded-lg border border-gray-200 text-gray-800">
                        #{{ $drink->id }}
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-500 mb-1">
                        Drink Name
                    </label>

                    <div class="w-full px-4 py-3 bg-gray-50 rounded-lg border border-gray-200 text-gray-800">
                        {{ $drink->name }}
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-500 mb-1">
                        Price
                    </label>

                    <div class="w-full px-4 py-3 bg-gray-50 rounded-lg border border-gray-200 text-gray-800">
                        ${{ number_format($drink->price, 2) }}
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-500 mb-1">
                        Stock
                    </label>

                    <div class="w-full px-4 py-3 bg-gray-50 rounded-lg border border-gray-200">
                        @if($drink->stock > 10)
                            <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                {{ $drink->stock }} in stock
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                Low Stock ({{ $drink->stock }})
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between pt-4">

                    <a href="{{ route('drinks.index') }}"
                       class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                        Back
                    </a>

                    <a href="{{ route('drinks.edit', $drink->id) }}"
                       class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                        Edit Drink
                    </a>

                </div>

            </div>
        </div>
    </div>

</body>
</html>
