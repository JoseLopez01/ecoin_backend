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
        $this->app->bind(
            'App\Interfaces\WeekDayInterface',
            'App\Repositories\WeekDayRepository'
        );
        $this->app->bind(
            'App\Interfaces\ActivityInterface',
            'App\Repositories\ActivityRepository'
        );
        $this->app->bind(
            'App\Interfaces\CourseInterface',
            'App\Repositories\CourseRepository'
        );
        $this->app->bind(
            'App\Interfaces\DeliverableFileInterface',
            'App\Repositories\DeliverableFileRepository'
        );
        $this->app->bind(
            'App\Interfaces\DeliverableInterface',
            'App\Repositories\DeliverableRepository'
        );
        $this->app->bind(
            'App\Interfaces\PriceInterface',
            'App\Repositories\PriceRepository'
        );
        $this->app->bind(
            'App\Interfaces\RewardInterface',
            'App\Repositories\RewardRepository'
        );
        $this->app->bind(
            'App\Interfaces\SaleDetailInterface',
            'App\Repositories\SaleDetailRepository'
        );
        $this->app->bind(
            'App\Interfaces\SaleHeaderInterface',
            'App\Repositories\SaleHeaderRepository'
        );
        $this->app->bind(
            'App\Interfaces\SaleStatusInterface',
            'App\Repositories\SaleStatusRepository'
        );
        $this->app->bind(
            'App\Interfaces\ShopInterface',
            'App\Repositories\ShopRepository'
        );
        $this->app->bind(
            'App\Interfaces\StudentCourseInterface',
            'App\Repositories\StudentCourseRepository'
        );
        $this->app->bind(
            'App\Interfaces\DeliverableStatusInterface',
            'App\Repositories\DeliverableStatusRepository'
        );
        $this->app->bind(
            'App\Interfaces\CourseScheduleInterface',
            'App\Repositories\CourseScheduleRepository'
        );
        $this->app->bind(
            'App\Interfaces\UserInterface',
            'App\Repositories\UserRepository'
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
