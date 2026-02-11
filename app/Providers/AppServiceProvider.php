<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;


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
        Gate::define('akses-admin', function ($user) {
            return $user->peran === 'admin';
        });
        Gate::define('akses-guru', function ($user) {
            return $user->peran === 'guru';
        });
        Gate::define('akses-siswa', function ($user) {
            return $user->peran === 'siswa';
        });
    }
}
