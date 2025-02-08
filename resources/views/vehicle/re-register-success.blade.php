@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h1 class="text-center text-2xl font-bold text-gray-800">Перерегистрация завершена</h1>

    <div class="bg-green-100 text-green-700 p-4 mt-6 rounded-md">
        <p><strong>Новый номер автомобиля:</strong> {{ session('unique_number') }}</p>
        <p><strong>Новый владелец:</strong> {{ session('new_owner') }}</p>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('vehicle.index') }}" class="text-blue-500 hover:text-blue-700">Вернуться на главную</a>
    </div>
</div>
@endsection
