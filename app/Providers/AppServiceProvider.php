<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
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
        View::composer('*', function ($view) {
        if (Auth::check()) {
            $notif = Auth::user()->notifikasi->where('isreaded', false)->count();
            $view->with('notif', $notif);
        }

    });
    if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}
