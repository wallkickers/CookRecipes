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
        // Api
        $this->app->bind(
            \packages\Api\Recepes\Recipe\RecipeUsecaseInterface::class,
            \packages\Api\Recepes\Recipe\RecipeInteractor::class
        );

        $this->app->bind(
            \packages\Api\Recepes\Recipe\RecipeRepositoryInterface::class,
            \packages\Api\Recepes\Recipe\RecipeRepository::class
        );

        $this->app->bind(
            \packages\Api\Recepes\RecipeCreate\RecipeCreateUsecaseInterface::class,
            \packages\Api\Recepes\RecipeCreate\RecipeCreateInteractor::class
        );

        // Web
        $this->app->bind(
            \packages\Web\Recepes\Recipe\RecipeUsecaseInterface::class,
            \packages\Web\Recepes\Recipe\RecipeInteractor::class
        );

        $this->app->bind(
            \packages\Web\Recepes\Recipe\RecipeRepositoryInterface::class,
            \packages\Web\Recepes\Recipe\RecipeRepository::class
        );

        $this->app->bind(
            \packages\Web\Recepes\RecipeCreate\RecipeCreateUsecaseInterface::class,
            \packages\Web\Recepes\RecipeCreate\RecipeCreateInteractor::class
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
