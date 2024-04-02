<!-- В header.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Планирощик</a>
        <!-- href="{{ url('/') }}" -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Главная</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/goals') }}">Цели</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/users') }}">Пользователи</a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/goals/create') }}">Создать цель</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav ms-auto">
                @if(Auth::check())
                    <li class="nav-item">
                        <span class="navbar-text">
                            Вошел пользователь: {{ Auth::user()->email }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Выйти</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
