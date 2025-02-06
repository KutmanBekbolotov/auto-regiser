@extends('layouts.app')

@section('content')
<div style="width: 80%; margin: 0 auto; padding-top: 20px;">
    <h1 style="text-align: center;">История владельцев автомобиля</h1>

    <h2>Номер автомобиля: {{ $vehicle->unique_number }}</h2>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ФИО владельца</th>
                <th>Дата регистрации</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $registration)
                <tr>
                    <td>{{ $registration->owner->full_name }}</td>
                    <td>{{ $registration->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
