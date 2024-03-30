<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error Page</title>
</head>
<body>
    <h2>{{ session('message') }}</h2>
    <a href="{{ url('items') }}">Назад к списку товаров</a>
</body>
</html>
