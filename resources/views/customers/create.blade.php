@extends('layouts.app')

@section('content')

<div class="h-screen flex items-start justify-center pt-2 bg-gray-100 overflow-hidden">

    <div class="w-full max-w-xl h-[80vh] bg-white rounded-2xl shadow-lg flex flex-col p-4">

        <!-- HEADER -->
        <div class="mb-2">
            <h1 class="text-xl font-bold text-gray-700">➕ Add Customer</h1>
            <p class="text-gray-500 text-xs">Fill customer information</p>
        </div>

        <!-- FORM -->
        <form id="customerForm"
              action="{{ route('customers.store') }}"
              method="POST"
              class="flex-1 grid grid-cols-1 gap-2">

            @csrf

            <div>
                <label class="text-xs font-semibold">Name</label>
                <input type="text" name="name"
                       class="w-full border rounded-lg px-3 py-2 text-sm">
            </div>

            <div>
                <label class="text-xs font-semibold">Email</label>
                <input type="email" name="email"
                       class="w-full border rounded-lg px-3 py-2 text-sm">
            </div>

            <div>
                <label class="text-xs font-semibold">Phone</label>
                <input type="text" name="phone"
                       class="w-full border rounded-lg px-3 py-2 text-sm">
            </div>

            <div>
                <label class="text-xs font-semibold">Address</label>
                <textarea name="address"
                          rows="2"
                          class="w-full border rounded-lg px-3 py-2 text-sm"></textarea>
            </div>

        </form>

        <!-- BUTTON (IMPORTANT FIX) -->
        <div class="pt-2">
            <button type="submit"
                    form="customerForm"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg text-sm font-semibold">
                Save Customer
            </button>
        </div>

    </div>

</div>

@endsection
