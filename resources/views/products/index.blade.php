@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-3">
    {{ session('success') }}
</div>
@endif

<!-- Header -->
<div class="flex justify-between items-center mb-4">

    <h2 class="text-xl font-bold text-pink-600">🧴 Products</h2>

    <a href="{{ route('products.create') }}"
       class="bg-gradient-to-r from-pink-500 to-rose-400 text-white px-4 py-2 rounded-lg shadow hover:from-pink-600 hover:to-rose-500">
        + Add Product
    </a>

</div>

<!-- Search -->
<div class="mb-4">
    <form method="GET">
        <input type="text" name="search"
               value="{{ request('search') }}"
               placeholder="Search skincare product..."
               class="border border-pink-200 focus:ring-2 focus:ring-pink-200 p-2 rounded-lg w-full md:w-1/3 outline-none">
    </form>
</div>

<!-- Table -->
<div class="bg-white shadow rounded-lg overflow-hidden">

    <table class="w-full text-sm">

        <thead class="bg-pink-50 text-gray-700">
            <tr>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Price</th>
                <th class="p-3 text-left">Stock</th>
                <th class="p-3 text-center">Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($products as $product)

            <tr class="border-b hover:bg-pink-50 transition">

                <td class="p-3 font-medium text-gray-800">
                    {{ $product->name }}
                </td>

                <td class="p-3 text-green-600 font-semibold">
                    ${{ $product->price }}
                </td>

                <td class="p-3">
                    @if($product->stock > 10)
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">In Stock</span>
                    @else
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs">
                            Low ({{ $product->stock }})
                        </span>
                    @endif
                </td>

                <td class="p-3 text-center space-x-2">

                    <a href="{{ route('products.show', $product->id) }}"
                       class="text-blue-600 hover:underline">
                        View
                    </a>

                    <a href="{{ route('products.edit', $product->id) }}"
                       class="text-yellow-600 hover:underline">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="inline">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Delete this product?')"
                                class="text-red-600 hover:underline">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="4" class="p-6 text-center text-gray-500">
                    No skincare products found 🧴
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

<!-- Pagination -->
<div class="mt-4">
    {{ $products->withQueryString()->links() }}
</div>

@endsection
