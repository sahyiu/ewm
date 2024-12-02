<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
        Gate::define('view-admin-dashboard', function ($user) {
            return $user->role == 'admin';
        });        
        Gate::define('view-registrar-dashboard', function ($user) {
            return $user->role == 'registrar';
        });   
        Gate::define('view-officer-dashboard', function ($user) {
            return $user->role == 'officer';
        });   
    }
}
