<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

// Обработка маршрутов для целей и пользователей
Route::get('/goals', [GoalController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);

// Лабораторная работа: Разработка методов CRUD
// Маршруты для работы с пользователями, доступны только аутентифицированным пользователям
Route::middleware('auth')->group(function () {
    // Отображение формы для создания нового пользователя
    Route::get('/users/create', [UserController::class, 'create']);
    // Обработка отправленной формы и сохранение нового пользователя
    Route::post('/users', [UserController::class, 'store']);
    // Отображение формы для редактирования пользователя
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);
    // Обработка запроса на обновление данных пользователя
    Route::put('/users/{id}', [UserController::class, 'update']);
    // Удаление пользователя
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});

// Лабораторная работа: Аутентификация пользователя с использованием метода Auth::attempt
// Маршруты для аутентификации
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);

// Лабораторная работа: Защита маршрутов от доступа неаутентифицированных пользователей
// Маршрут /login теперь имеет имя 'login', используемое в middleware 'auth'
// Это имя используется для перенаправления неаутентифицированных пользователей на страницу входа

// Лабораторная работа: Авторизация пользователей с помощью Gate
Route::get('/error', function () {
    return view('error');
});

// Базовый маршрут для страницы приветствия
Route::get('/', function () {
    return view('welcome');
});
