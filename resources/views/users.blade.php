<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>users Profile</title>
</head>
<body>
    <h2>Список паользователей</h2>
    @if($users)
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>usersname</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>
