<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
</head>
<body>
    <h2>{{ $user ? "Список целей для пользователя " . $user->username : "Неверный ID цели" }}</h2>
    @if($user)
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($user->goals as $goal)
            <tr>
                <td>{{ $goal->id }}</td>
                <td>{{ $goal->name_goal }}</td>
                <td>{{ $goal->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>