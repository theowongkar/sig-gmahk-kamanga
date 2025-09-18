<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        // Jemaat
        Gate::define('manage-congregation', function ($user) {
            return $user->role === 'Admin';
        });

        // Berita
        Gate::define('manage-post', function ($user) {
            return in_array($user->role, ['Admin', 'Operator']);
        });

        // Ibadah
        Gate::define('manage-worship', function ($user) {
            return in_array($user->role, ['Admin', 'Operator', 'Pendeta']);
        });

        // Pengajuan Ibadah
        Gate::define('manage-request-worship', function ($user) {
            return in_array($user->role, ['Admin', 'Operator', 'Pendeta']);
        });
    }
}
