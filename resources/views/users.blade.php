{{-- resources/views/users.blade.php --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список пользователей</title>
</head>
<body>
    <h2>Список пользователей</h2>
    @if($users->count())
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя пользователя</th>
                    <th>Email</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('/users/edit/'.$user->id) }}">Редактировать</a>
                        <form action="{{ url('/users/' . $user->id) }}" method="POST" onsubmit="return confirm('Вы уверены?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }} {{-- Вставляем здесь --}}
    @else
        <p>Пользователи не найдены.</p>
    @endif
</body>
</html>
