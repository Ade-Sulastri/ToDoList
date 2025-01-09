<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        View::composer('components.admin.layout', function ($view) {
            $admin = Admin::where('id', 1)->first();
            $view->with('admin', $admin);
        });
    }
}
