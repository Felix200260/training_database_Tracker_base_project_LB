<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add User</title>
    <style>.is-invalid { color: red; }</style>
</head>
<body>
    @include('header')  
    <h2>Добавление пользователя</h2>
    <form method="post" action="{{ url('users') }}">
        @csrf

        <label>Имя пользователя</label>
        <input type="text" name="username" value="{{ old('username') }}">
        @error('username')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <label>Пароль</label>
        <input type="password" name="password">
        @error('password')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <label>Имя</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}">
        @error('first_name')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <label>Фамилия</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}">
        @error('last_name')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>

        <input type="submit" value="Добавить">
    </form>
</body>
</html>
