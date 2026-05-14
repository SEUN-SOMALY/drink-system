@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-3 px-2">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-700">
                👥 Customers
            </h1>
            <p class="text-gray-500 text-sm">
                Manage customer data
            </p>
        </div>

        <a href="{{ route('customers.create') }}"
           class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm shadow">
            + Add
        </a>

    </div>

    <!-- SUCCESS -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 text-sm rounded-lg mb-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- DESKTOP TABLE -->
    <div class="hidden md:block bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-pink-500 text-white">

                <tr>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Phone</th>
                    <th class="p-3 text-left">Address</th>
                    <th class="p-3 text-center">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($customers as $customer)

                <tr class="border-b hover:bg-pink-50">

                    <td class="p-2 font-medium text-gray-700">
                        {{ $customer->name }}
                    </td>

                    <td class="p-2">{{ $customer->email }}</td>
                    <td class="p-2">{{ $customer->phone }}</td>
                    <td class="p-2">{{ $customer->address }}</td>

                    <td class="p-2">
                        <div class="flex justify-center gap-1">

                            <a href="{{ route('customers.edit', $customer->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-xs">
                                Edit
                            </a>

                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">
                                    Delete
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center p-6 text-gray-400 text-sm">
                        No customers found
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- MOBILE CARD VIEW -->
    <div class="md:hidden space-y-3">

        @forelse($customers as $customer)

        <div class="bg-white shadow rounded-xl p-4">

            <div class="font-bold text-gray-700">
                {{ $customer->name }}
            </div>

            <div class="text-sm text-gray-600 mt-1">
                📧 {{ $customer->email }}
            </div>

            <div class="text-sm text-gray-600">
                📞 {{ $customer->phone }}
            </div>

            <div class="text-sm text-gray-600">
                📍 {{ $customer->address }}
            </div>

            <div class="flex gap-2 mt-3">

                <a href="{{ route('customers.edit', $customer->id) }}"
                   class="bg-yellow-400 text-white px-3 py-1 rounded text-xs">
                    Edit
                </a>

                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Delete?')"
                            class="bg-red-500 text-white px-3 py-1 rounded text-xs">
                        Delete
                    </button>

                </form>

            </div>

        </div>

        @empty

        <div class="text-center text-gray-400">
            No customers found
        </div>

        @endforelse

    </div>

</div>

@endsection
