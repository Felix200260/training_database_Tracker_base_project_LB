<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>User Profile</title>
</head>
@include('header') 
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