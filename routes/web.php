<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoalController;
use App\Http\Controllers\UserController;

Route::resource('/goals', GoalController::class, 'index');
Route::resource('/users', UserController::class, 'index');

// Route::resource('/goals', GoalController::class);
// Route::resource('/users', UserController::class);

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
