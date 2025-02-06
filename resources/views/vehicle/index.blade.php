@extends('layouts.app')

@section('content')
<div style="width: 80%; margin: 0 auto; padding-top: 20px;">
    <h1 style="text-align: center;">Система учета автотранспортных средств</h1>

    <div style="display: flex; justify-content: space-around; margin-top: 40px;">
    <a href="{{ route('vehicle.register') }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Зарегистрировать автомобиль</a>
    <a href="{{ route('vehicle.re-register', ['vehicle_id' => 1]) }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Перерегистрировать автомобиль</a>
    <a href="{{ route('vehicle.models') }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Просмотреть модели авто</a>
    <a href="{{ route('vehicle.history.form') }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Просмотреть историю владельцев</a>
</div>

<div style="margin-top: 40px; text-align: center;">
    <p>Выберите действие, которое вы хотите выполнить.</p>
</div>

</div>
@endsection
