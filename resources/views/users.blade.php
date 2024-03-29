{{-- resources/views/users.blade.php --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список пользователей</title>
</head>
<body>
    <h2>Список пользователей</h2>

    <nav>
        Элементов на странице:
        <form method="get" action="{{ url('users') }}">
            <select name="perpage" onchange="this.form.submit()">
                <option value="2" @if(request('perpage') == 2) selected @endif>2</option>
                <option value="3" @if(request('perpage') == 3) selected @endif>3</option>
                <option value="4" @if(request('perpage') == 4) selected @endif>4</option>
            </select>
        </form>
    </nav>

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
