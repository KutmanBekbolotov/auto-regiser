@extends('layouts.app')

@section('content')
<div style="width: 80%; margin: 0 auto; padding-top: 20px;">
    <h1 style="text-align: center;">Список моделей автомобилей</h1>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Модель</th>
                <th>Количество автомобилей</th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
                <tr>
                    <td>{{ $model->model }}</td>
                    <td>{{ $model->vehicle_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
