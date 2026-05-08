@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-3">
    {{ session('success') }}
</div>
@endif

<div class="flex justify-between mb-3">
    <a href="{{ route('drinks.create') }}"
       class="bg-blue-500 text-white px-3 py-2 rounded">
        + Add Drink
    </a>

    <form method="GET">
        <input type="text" name="search"
               value="{{ request('search') }}"
               placeholder="Search..."
               class="border p-2 rounded">
    </form>
</div>

<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2">Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    @forelse($drinks as $drink)
        <tr class="text-center border-b">
            <td>{{ $drink->name }}</td>
            <td>${{ $drink->price }}</td>
            <td>
                @if($drink->stock > 10)
                    <span class="text-green-600">OK</span>
                @else
                    <span class="text-red-600">LOW</span>
                @endif
            </td>

            <td>
                <a href="{{ route('drinks.show', $drink->id) }}" class="text-blue-600">View</a>
                <a href="{{ route('drinks.edit', $drink->id) }}" class="text-yellow-600 ml-2">Edit</a>

                <form method="POST" action="{{ route('drinks.destroy', $drink->id) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete?')" class="text-red-600 ml-2">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="p-4 text-center text-gray-500">
                No data found
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $drinks->withQueryString()->links() }}
</div>

@endsection
