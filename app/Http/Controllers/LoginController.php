<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Добавлено для использования Auth
use Illuminate\Http\RedirectResponse; // Добавьте этот импорт для RedirectResponse

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) 
        {
            // dd(Auth::user()); // Выведет информацию о пользователе
            $request->session()->regenerate();

            // return redirect()->intended('login');
            return view('home', ['user' => Auth::user()]);
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('email', 'password');
    }
    public function login(Request $request)
    {
        return view('login', ['user' => Auth::user()]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }


}