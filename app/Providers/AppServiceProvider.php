<?php

namespace App\Providers;

// use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Item;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // Определение правила 'delete-user' для проверки возможности удаления пользователя.
    public function boot()
    {
        Gate::define('delete-user', function ($authUser, $user) {
            // Возвращает true, если email пользователя содержит заглавную букву и текущий пользователь является администратором.
            return preg_match('/[A-ZА-ЯЁ]/', $user->email) && $authUser->is_admin;
        });
    }
}
