<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Вход в систему</title>
    <style>
        .is-invalid { color: red; }
        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7;
        }
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
    </style>
</head>
<body class="login-page">
    {{--<header>--}}
    {{-- @include('header')--}}
    {{--</header>--}}
    <div class="form-signin">
        <title>Вход в систему</title>
        <div class="form-signin">
            @if(auth()->check())
                <h2 class="h3 mb-3 fw-normal">Здравствуйте, {{ auth()->user()->name }}</h2>
                <a href="{{ url('logout') }}" class="w-100 btn btn-lg btn-primary">Выйти из системы</a>
            @else
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
                <h2 class="h3 mb-3 fw-normal">Вход в систему</h2>
                <form method="post" action="{{ url('auth') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="floatingInput">E-mail адрес</label>
                        @error('email')
                            <div class="is-invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" value="{{ old('password') }}">
                        <label for="floatingPassword">Пароль</label>
                        @error('password')
                            <div class="is-invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Отправить</button>
                </form>
                @error('error')
                    <div class="is-invalid mt-3">{{ $message }}</div>
                @enderror
            @endif
        </div>
    </div>
</body>
</html>
