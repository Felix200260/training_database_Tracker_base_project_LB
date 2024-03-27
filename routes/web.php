<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoalController;
use App\Http\Controllers\UserController;

// Route::resource('/goals', GoalController::class, 'index');
// Route::resource('/users', UserController::class, 'index');

Route::get('/goals', [GoalController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
//обрабатывает GET-запросы и используется для отображения списка всех пользователей.
Route::get('/users', [UserController::class, 'index']);

// Отображение формы для создания нового пользователя
Route::get('/users/create', [UserController::class, 'create']);

// Обработка отправленной формы и сохранение нового пользователя/ обрабатывает POST-запросы и используется для приёма данных из формы и создания нового пользователя в базе данных.
Route::post('/users', [UserController::class, 'store']);

Route::get('/users/edit/{id}', [UserController::class, 'edit']);

Route::put('/users/{id}', [UserController::class, 'update']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
