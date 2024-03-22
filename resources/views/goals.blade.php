<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список целей</title>
    <!-- Добавьте ссылки на CSS здесь, если это необходимо -->
</head>
<body>
    <h2>Список целей</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название цели</th>
                <th>Описание</th>
                <th>ID приоритета</th>
                <th>ID статуса</th>
                <th>ID пользователя</th>
                <th>Дата создания</th>
                <th>Дата обновления</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($goals as $goal)
                <tr>
                    <td>{{ $goal->id }}</td>
                    <td>{{ $goal->name_goal }}</td>
                    <td>{{ $goal->description }}</td>
                    <td>{{ $goal->priorities_id }}</td>
                    <td>{{ $goal->statuses_id }}</td>
                    <td>{{ $goal->user_id }}</td>
                    <td>{{ $goal->created_at }}</td>
                    <td>{{ $goal->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
