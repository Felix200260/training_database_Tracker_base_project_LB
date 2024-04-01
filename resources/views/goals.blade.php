<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Список целей</title>
    <!-- Добавьте ссылки на CSS здесь, если это необходимо -->
</head>
<body>
    <header>
        @include('header') 
    </header>
    <h2>Список целей</h2>
    <table class="table table-hover table-responsive">
        <thead class="table-light">
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
