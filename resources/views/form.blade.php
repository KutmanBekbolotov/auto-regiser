<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($vehicle_id) ? 'Перерегистрация' : 'Регистрация' }} автомобиля</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">{{ isset($vehicle_id) ? 'Перерегистрация' : 'Регистрация' }} автомобиля</h2>

            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <form action="{{ isset($vehicle_id) ? route('vehicle.re-register.store', ['vehicle_id' => $vehicle_id]) : route('vehicle.store') }}" method="POST">
                @csrf
                @if(isset($vehicle_id))
                    <input type="hidden" name="vehicle_id" value="{{ $vehicle_id }}">
                @endif

                <div class="mb-3">
                    <label for="full_name" class="form-label">ФИО владельца</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $vehicle->owner->full_name ?? '') }}" required>
                </div>

                @if(!isset($vehicle_id))
                    <div class="mb-3">
                        <label for="brand" class="form-label">Марка автомобиля</label>
                        <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">Модель автомобиля</label>
                        <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>
                    </div>
                @else
                    <div class="mb-3">
                        <label for="brand" class="form-label">Марка автомобиля</label>
                        <input type="text" class="form-control" id="brand" value="{{ $vehicle->brand }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">Модель автомобиля</label>
                        <input type="text" class="form-control" id="model" value="{{ $vehicle->model }}" disabled>
                    </div>
                @endif

                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">{{ isset($vehicle_id) ? 'Перерегистрировать' : 'Зарегистрировать' }}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
