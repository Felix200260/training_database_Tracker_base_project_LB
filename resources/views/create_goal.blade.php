@extends('layout')

@section('title', 'Добавить новую цель')

@section('content')
<div class="container">
    
    <!-- Сообщения об ошибках и успехе -->
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div> <!-- Тут добавлено сообщение об ошибке из сессии -->
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div> <!-- Тут добавлено сообщение об успехе из сессии -->
    @endif
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <h1>Добавить новую цель</h1>

    <form method="POST" action="{{ route('goals.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name_goal" class="form-label">Название цели</label>
            <input type="text" class="form-control" id="name_goal" name="name_goal" required>
            @error('name_goal') <!-- Вывод сообщения об ошибке для поля 'name_goal' -->
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <input type="text" class="form-control" id="description" name="description">
            @error('description') <!-- Вывод сообщения об ошибке для поля 'description' -->
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="priorities_id" class="form-label">Приоритет</label>
            <select class="form-control" id="priorities_id" name="priorities_id">
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->priorities_level }}</option>
                @endforeach
            </select>
            @error('priorities_id') <!-- Вывод сообщения об ошибке для поля 'priorities_id' -->
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="statuses_id" class="form-label">Статус</label>
            <select class="form-control" id="statuses_id" name="statuses_id">
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->statuses_description }}</option>
                @endforeach
            </select>
            @error('statuses_id') <!-- Вывод сообщения об ошибке для поля 'statuses_id' -->
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
