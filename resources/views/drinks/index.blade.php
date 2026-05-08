<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink Management</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased">

    <div class="p-6 bg-gray-50 min-h-screen">

        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="flex items-center justify-between mb-6">

                <h1 class="text-2xl font-bold text-gray-800">
                    Drink Management
                </h1>

                <a href="{{ route('drinks.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold shadow-sm">

                    + Add New Drink

                </a>

            </div>

            <!-- Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

                <table class="w-full text-left border-collapse">

                    <!-- Table Head -->
                    <thead class="bg-gray-50 border-b border-gray-200">

                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                ID
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Drink Name
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Price
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Stock Status
                            </th>

                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">
                                Actions
                            </th>
                        </tr>

                    </thead>

                    <!-- Table Body -->
                    <tbody class="divide-y divide-gray-100">

                        @foreach($drinks as $drink)

                        <tr class="hover:bg-gray-50 transition-colors">

                            <!-- ID -->
                            <td class="px-6 py-4 text-sm text-gray-600">
                                #{{ $drink->id }}
                            </td>

                            <!-- Drink Name -->
                            <td class="px-6 py-4">

                                <span class="text-sm font-medium text-gray-900">
                                    {{ $drink->name }}
                                </span>

                            </td>

                            <!-- Price -->
                            <td class="px-6 py-4 text-sm text-gray-700">

                                ${{ number_format($drink->price, 2) }}

                            </td>

                            <!-- Stock -->
                            <td class="px-6 py-4">

                                @if($drink->stock > 10)

                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $drink->stock }} in stock
                                    </span>

                                @else

                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Low Stock ({{ $drink->stock }})
                                    </span>

                                @endif

                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 text-right space-x-3">

                                <!-- Show -->
                                <a href="{{ route('drinks.show', $drink->id) }}"
                                   class="text-green-600 hover:text-green-800 font-medium text-sm">

                                    Show

                                </a>

                                <!-- Edit -->
                                <a href="{{ route('drinks.edit', $drink->id) }}"
                                   class="text-blue-600 hover:text-blue-900 font-medium text-sm">

                                    Edit

                                </a>

                                <!-- Delete -->
                                <form action="{{ route('drinks.destroy', $drink->id) }}"
                                      method="POST"
                                      class="inline-block">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Are you sure?')"
                                            class="text-red-500 hover:text-red-700 font-medium text-sm">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>
</html>
