<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    // $goals = Goal::all();
    //     return view('goals', ['goals' => $goals]);

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Создаем новый экземпляр модели User для формы.
        $user = new User();
        // Возвращаем представление user_create с экземпляром User.
        return view('user_create', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6',
            'first_name' => 'max:255', // предположим, что имя необязательно и может быть не уникальным
            'last_name' => 'max:255',  // предположим, что фамилия необязательна и может быть не уникальной
        ]);

        // Хэширование пароля перед сохранением
        $validated['password'] = bcrypt($validated['password']);

        $user = new User($validated);
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->save();

        // Вероятно, вы захотите перенаправить пользователя на список пользователей
        return redirect('/users');
    }


    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     return view('user1', [
    //         'user' => User::all()->where('id',$id)->first(),
    //     ]);
    // }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Находим пользователя по id
        $user = User::findOrFail($id);

        // Возвращаем представление для редактирования пользователя
        // и передаем найденного пользователя в это представление
        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'first_name' => 'max:255',
            'last_name' => 'max:255',
        ]);

        $user = User::findOrFail($id);
        $user->fill($validatedData);
        $user->save();

        return redirect('/users')->with('success', 'User updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users')->with('success', 'Пользователь был удалён.');
    }
}
