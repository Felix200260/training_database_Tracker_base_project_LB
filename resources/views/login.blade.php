<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>605-01</title>
    <style>
        .is-invalid { color: red; }
    </style>
</head>
<body>
@include('header')
@if(auth()->check())
    <h2>Здравствуйте {{ auth()->user()->name }}</h2>
    <a href="{{ url('logout') }}">Выйти из системы</a>
@else
    <h2>Вход в систему</h2>
    <form method="post" action="{{ url('auth') }}">
        @csrf
        <label>E-mail</label>
        <input type="text" name="email" value="{{ old('email') }}" />
        @error('email')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Пароль</label>
        <input type="password" name="password" value="{{ old('password') }}" />
        @error('password')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <input type="submit">
    </form>
    @error('error')
        <div class="is-invalid">{{ $message }}</div>
    @enderror
@endif
</body>
</html>
