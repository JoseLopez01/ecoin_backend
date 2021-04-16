<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\AuthInterface',
            'App\Repositories\AuthRepository'
        );
        $this->app->bind(
            'App\Interfaces\UserTypeInterface',
            'App\Repositories\UserTypeRepository'
        );
        $this->app->bind(
            'App\Interfaces\SemesterInterface',
            'App\Repositories\SemesterRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
