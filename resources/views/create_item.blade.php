@extends('layout')

@section('title')
Создать товар
@endsection

@section('content')
<div class="container">
    <h1>Создать товар</h1>
    <!-- Форма для создания товара -->
    <form method="POST" action="{{ route('items.store') }}"> <!-- Пример маршрута -->
        @csrf <!-- Токен CSRF для безопасности -->
        <div class="mb-3">
            <label for="name" class="form-label">Название товара</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <!-- Дополнительные поля -->
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
