{{-- Наследуем макет user_layout --}}
@extends('user_layout')

{{-- Устанавливаем значение для секции title --}}
@section('title', 'Список пользователей')

{{-- Заполняем секцию content --}}
@section('content')
    <div class="container">
        <h1>Список пользователей</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Добавить пользователя</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя пользователя</th>
                    <th>Email</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                {{-- Проходимся циклом по массиву пользователей и выводим данные --}}
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Просмотр</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Редактировать</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Пагинация --}}
        {{ $users->links() }}
    </div>
@endsection
