@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('drinks.store') }}" class="bg-white p-5 shadow rounded">
    @csrf

    <input type="text" name="name" placeholder="Name" class="border p-2 w-full mb-2">
    <input type="number" name="price" placeholder="Price" class="border p-2 w-full mb-2">
    <input type="number" name="stock" placeholder="Stock" class="border p-2 w-full mb-2">

    <button class="bg-green-500 text-white px-4 py-2 rounded">
        Save
    </button>
</form>

@endsection
