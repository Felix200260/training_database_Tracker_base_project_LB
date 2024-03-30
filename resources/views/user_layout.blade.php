<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ссылки на Bootstrap CSS и Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Пользователи - @yield('title')</title>
</head>
<body>
    <header>
        <!-- Здесь может быть навигационное меню -->
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="text-center py-4">
        <!-- Здесь может быть подвал сайта -->
    </footer>

    <!-- Ссылки на Bootstrap JS и зависимости -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
