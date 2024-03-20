<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users List</title>
</head>
<body>
    <h2>Список пользователей:</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <!-- Добавьте другие заголовки столбцов, если необходимо -->
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <!-- Выведите другие атрибуты пользователя, если необходимо -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
