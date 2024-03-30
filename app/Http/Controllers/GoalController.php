<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Status;
use App\Models\Priority;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::all();
        return view('goals', ['goals' => $goals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Передаем в представление список статусов и приоритетов
        // предполагая, что у вас есть соответствующие модели и таблицы в базе данных
        $statuses = Status::all();
        $priorities = Priority::all();
        return view('create_goal', compact('statuses', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Убедитесь, что пользователь аутентифицирован
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Для добавления цели необходимо войти в систему.');
        }
        // Валидация входящего запроса
        $validatedData = $request->validate([
            'name_goal' => 'required|max:255',
            'description' => 'nullable|max:255',
            'priorities_id' => 'required|exists:priorities,id',
            'statuses_id' => 'required|exists:statuses,id',
            // Убеждаемя, что 'user_id' принадлежит текущему аутентифицированному пользователю
            'user_id' => 'required|exists:users,id|in:'.auth()->id(),
        ]);

        // Создание новой цели
        $goal = new Goal($validatedData);
        $goal->user_id = auth()->id(); // Установка ID пользователя
        $goal->save();

        // Перенаправление обратно к списку целей с сообщением об успехе
        return redirect('/goals')->with('success', 'Цель успешно добавлена.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
