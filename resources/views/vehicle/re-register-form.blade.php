@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h1 class="text-center text-2xl font-bold text-gray-800">Перерегистрация автомобиля</h1>

    @if(session('message'))
        <div class="bg-green-100 text-green-700 p-3 mt-4 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mt-4 rounded-md">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vehicle.re-register.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 mt-6">
        @csrf
        <div class="mb-4">
            <label for="unique_number" class="block text-gray-700 font-medium">Номер автомобиля (AUTO-XXXXXX)</label>
            <input type="text" id="unique_number" name="unique_number" value="{{ old('unique_number') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>
        <div class="mb-4">
            <label for="owner_full_name" class="block text-gray-700 font-medium">ФИО текущего владельца</label>
            <input type="text" id="owner_full_name" name="owner_full_name" value="{{ old('owner_full_name') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>
        <div class="mb-6">
            <label for="new_owner_full_name" class="block text-gray-700 font-medium">ФИО нового владельца</label>
            <input type="text" id="new_owner_full_name" name="new_owner_full_name" value="{{ old('new_owner_full_name') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">Перерегистрировать</button>
    </form>
</div>
@endsection
