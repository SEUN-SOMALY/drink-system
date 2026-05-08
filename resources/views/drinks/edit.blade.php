@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('drinks.update', $drink->id) }}" class="bg-white p-5 shadow rounded">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $drink->name }}" class="border p-2 w-full mb-2">
    <input type="number" name="price" value="{{ $drink->price }}" class="border p-2 w-full mb-2">
    <input type="number" name="stock" value="{{ $drink->stock }}" class="border p-2 w-full mb-2">

    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Update
    </button>
</form>

@endsection
