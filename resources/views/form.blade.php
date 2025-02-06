<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($vehicle_id) ? 'Перерегистрация' : 'Регистрация' }} автомобиля</title>
</head>
<body>
    <h1>{{ isset($vehicle_id) ? 'Перерегистрация' : 'Регистрация' }} автомобиля</h1>

    @if(session('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ isset($vehicle_id) ? route('vehicle.re-register.store', ['vehicle_id' => $vehicle_id]) : route('vehicle.store') }}" method="POST">
        @csrf
        @if(isset($vehicle_id))
            <input type="hidden" name="vehicle_id" value="{{ $vehicle_id }}">
        @endif

        <div>
            <label for="full_name">ФИО владельца:</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $vehicle->owner->full_name ?? '') }}" required>
        </div>

        @if(!isset($vehicle_id))
            <div>
                <label for="brand">Марка автомобиля:</label>
                <input type="text" id="brand" name="brand" value="{{ old('brand') }}" required>
            </div>

            <div>
                <label for="model">Модель автомобиля:</label>
                <input type="text" id="model" name="model" value="{{ old('model') }}" required>
            </div>
        @else
            <div>
                <label for="brand">Марка автомобиля:</label>
                <input type="text" id="brand" name="brand" value="{{ $vehicle->brand }}" disabled required>
            </div>

            <div>
                <label for="model">Модель автомобиля:</label>
                <input type="text" id="model" name="model" value="{{ $vehicle->model }}" disabled required>
            </div>
        @endif

        <button type="submit">{{ isset($vehicle_id) ? 'Перерегистрировать' : 'Зарегистрировать' }}</button>
    </form>

</body>
</html>
