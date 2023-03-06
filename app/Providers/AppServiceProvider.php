<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function (User $user) {
            return $user->jabatan === 'admin';
        });
        Gate::define('staff', function (User $user) {
            return $user->jabatan === 'staff';
        });
        Gate::define('manajer', function (User $user) {
            return $user->jabatan === 'manajer';
        });
    }
}