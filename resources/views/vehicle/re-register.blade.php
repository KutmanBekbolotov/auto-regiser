@extends('layouts.app')

@section('content')
<div style="width: 80%; margin: 0 auto; padding-top: 20px;">
    <h1 style="text-align: center;">Перерегистрация автомобиля</h1>

    @if(session('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vehicle.re-register.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label for="unique_number">Номер автомобиля (AUTO-XXXXXX)</label>
            <input type="text" id="unique_number" name="unique_number" required style="width: 100%; padding: 10px; margin-top: 5px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label for="owner_full_name">ФИО текущего владельца</label>
            <input type="text" id="owner_full_name" name="owner_full_name" required style="width: 100%; padding: 10px; margin-top: 5px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label for="new_owner_full_name">ФИО нового владельца</label>
            <input type="text" id="new_owner_full_name" name="new_owner_full_name" required style="width: 100%; padding: 10px; margin-top: 5px;">
        </div>
        <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Перерегистрировать</button>
    </form>
</div>
@endsection
