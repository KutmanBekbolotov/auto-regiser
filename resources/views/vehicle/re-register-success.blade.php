<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перерегистрация успешна</title>
</head>
<body>
    <h1>Перерегистрация завершена</h1>

    <p><strong>Новый номер автомобиля:</strong> {{ session('unique_number') }}</p>
    <p><strong>Новый владелец:</strong> {{ session('new_owner') }}</p>

    <a href="{{ route('vehicle.index') }}">Вернуться на главную</a>
</body>
</html>
