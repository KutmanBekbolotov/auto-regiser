@extends('layouts.app')

@section('content')
<div style="width: 80%; margin: 0 auto; padding-top: 20px; text-align: center;">
    <h1 style="font-size: 24px; color: #333; font-weight: bold;">Система учета автотранспортных средств</h1>

    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 15px; margin-top: 40px;">
        <a href="{{ route('vehicle.register') }}" class="btn">Зарегистрировать автомобиль</a>
        <a href="{{ route('vehicle.re-register', ['vehicle_id' => 1]) }}" class="btn">Перерегистрировать автомобиль</a>
        <a href="{{ route('vehicle.models') }}" class="btn">Просмотреть модели авто</a>
        <a href="{{ route('vehicle.history.form') }}" class="btn">Просмотреть историю владельцев</a>
    </div>

    <div style="margin-top: 40px; text-align: center;">
        <p style="font-size: 16px; color: #666;">Выберите действие, которое вы хотите выполнить.</p>
    </div>
</div>

<style>
    .btn {
        padding: 12px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }
</style>
@endsection