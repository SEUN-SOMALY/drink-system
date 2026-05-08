@extends('layouts.app')

@section('content')

<div class="bg-white p-5 shadow rounded">
    <h2 class="text-2xl font-bold">{{ $drink->name }}</h2>

    <p class="mt-2">Price: ${{ $drink->price }}</p>
    <p>Stock: {{ $drink->stock }}</p>

    <a href="{{ route('drinks.index') }}" class="text-blue-500 mt-3 inline-block">
        ← Back
    </a>
</div>

@endsection
