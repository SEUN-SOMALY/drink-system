@extends('layouts.app')

@section('content')

<div class="h-screen flex items-start justify-center pt-3 bg-gray-100 overflow-hidden">

    <!-- SMALL CARD -->
    <div class="w-full max-w-xl h-[82vh] bg-white rounded-2xl shadow-lg flex flex-col p-4">

        <!-- HEADER -->
        <div class="mb-2">

            <h1 class="text-xl font-bold text-gray-700">
                ✏ Edit Customer
            </h1>

            <p class="text-gray-500 text-xs">
                Update customer information
            </p>

        </div>

        <!-- FORM (IMPORTANT: add id here) -->
        <form id="editForm"
              action="{{ route('customers.update', $customer->id) }}"
              method="POST"
              class="flex-1 grid grid-cols-1 gap-2">

            @csrf
            @method('PUT')

            <!-- NAME -->
            <div>
                <label class="text-xs font-semibold text-gray-700">Name</label>
                <input type="text"
                       name="name"
                       value="{{ $customer->name }}"
                       class="w-full border rounded-lg px-3 py-2 text-sm">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="text-xs font-semibold text-gray-700">Email</label>
                <input type="email"
                       name="email"
                       value="{{ $customer->email }}"
                       class="w-full border rounded-lg px-3 py-2 text-sm">
            </div>

            <!-- PHONE -->
            <div>
                <label class="text-xs font-semibold text-gray-700">Phone</label>
                <input type="text"
                       name="phone"
                       value="{{ $customer->phone }}"
                       class="w-full border rounded-lg px-3 py-2 text-sm">
            </div>

            <!-- ADDRESS -->
            <div>
                <label class="text-xs font-semibold text-gray-700">Address</label>
                <textarea name="address"
                          rows="2"
                          class="w-full border rounded-lg px-3 py-2 text-sm">{{ $customer->address }}</textarea>
            </div>

        </form>

        <!-- BUTTON (NOW WORKS) -->
        <div class="pt-2">

            <button type="submit"
                    form="editForm"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg text-sm font-semibold">
                Update Customer
            </button>

        </div>

    </div>

</div>

@endsection
