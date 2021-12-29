<?php

namespace App\Providers;

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
        $this->app->bind(
            \packages\Api\Recepes\Recipe\RecipeUsecaseInterface::class,
            \packages\Api\Recepes\Recipe\RecipeInteractor::class
        );

        $this->app->bind(
            \packages\Api\Recepes\Recipe\RecipeRepositoryInterface::class,
            \packages\Api\Recepes\Recipe\RecipeRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
