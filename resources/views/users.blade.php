<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список пользователей</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        @include('header') 
    </header>

    <div class="container mt-3">
        <h2>Список пользователей</h2>

        <nav>
            Элементов на странице:
            <form method="get" action="{{ url('users') }}" class="mb-3">
                <select name="perpage" class="form-select" onchange="this.form.submit()">
                    <option value="2" @if(request('perpage') == 2) selected @endif>2</option>
                    <option value="3" @if(request('perpage') == 3) selected @endif>3</option>
                    <option value="4" @if(request('perpage') == 4) selected @endif>4</option>
                </select>
            </form>
        </nav>

        @if($users->count())
            <table class="table table-hover table-responsive">
                <thead class="table-light">
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
                            <a href="{{ url('/users/edit/'.$user->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                            <form action="{{ url('/users/' . $user->id) }}" method="POST" onsubmit="return confirm('Вы уверены?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }} {{-- Пагинация --}}
        @else
            <p>Пользователи не найдены.</p>
        @endif
    </div>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
