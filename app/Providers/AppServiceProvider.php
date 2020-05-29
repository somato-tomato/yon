<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength('191');
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        Gate::define('logMan', function($user) {
            return $user->role == 'logMan';
        });

        Gate::define('logSup', function($user) {
            return $user->role == 'logSup';
        });

        Gate::define('logUudp', function($user) {
            return $user->role == 'logUudp';
        });

        Gate::define('logStaff', function($user) {
            return $user->role == 'logStaff';
        });

        Gate::define('gudSup', function($user) {
            return $user->role == 'gudSup';
        });

        Gate::define('gudStaff', function($user) {
            return $user->role == 'gudStaff';
        });

        Gate::define('ppcMan', function($user) {
            return $user->role == 'ppcMan';
        });

        Gate::define('ppc', function($user) {
            return $user->role == 'ppc';
        });

        Gate::define('mutu', function($user) {
            return $user->role == 'mutu';
        });

        Gate::define('admin', function($user) {
            return $user->role == 'admin';
        });
    }
}
