<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Item;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Получаем значение perpage из запроса или используем значение по умолчанию 2
        $perPage = request('perpage', 2);

        $users = User::paginate($perPage);
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

        return redirect('/users')->with('success', 'Пользователь обновлен успешно!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Проверка прав пользователя на удаление через Gate
        // Gate 'delete-user' должен быть определен в AuthServiceProvider и
        // проверять наличие заглавных букв в email пользователя
        if (!Gate::allows('delete-user', $user)) {
            // Если Gate возвращает false, сохраняем сообщение об ошибке в флэш-сессию
            // и перенаправляем на страницу ошибки
            return redirect('/error')->with('message', "У вас нет разрешения на удаление пользователя с email {$user->email}");
        }

        // Если Gate возвращает true, удаляем пользователя
        $user->delete();

        // Сохраняем сообщение об успешном действии в флэш-сессию
        // и перенаправляем на список пользователей
        return redirect('/users')->with('success', "Пользователь с email {$user->email} был удалён.");
    }


}
