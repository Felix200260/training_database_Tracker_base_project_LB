<?php

namespace App\Providers;

// use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator;
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
    public function boot()
    {
        // $this->registerPolicies();

        // Gate::define('delete-item', function ($user, $item) {
        //     // Проверяем, содержит ли название товара хотя бы одну заглавную букву
        //     return preg_match('/[A-ZА-ЯЁ]/', $item->name);
        // });
    }
}
