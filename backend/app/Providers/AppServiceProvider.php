<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // MasterData
        $this->app->bind(
            \packages\Web\MasterData\MasterDataRepositoryInterface::class,
            \packages\Web\MasterData\MasterDataRepository::class
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

        $this->app->bind(
            \packages\Web\Recepes\RecipeDetail\RecipeDetailUsecaseInterface::class,
            \packages\Web\Recepes\RecipeDetail\RecipeDetailInteractor::class
        );

        $this->app->bind(
            \packages\Web\Recepes\RecipeEdit\RecipeEditUsecaseInterface::class,
            \packages\Web\Recepes\RecipeEdit\RecipeEditInteractor::class
        );

        $this->app->bind(
            \packages\Web\Recepes\RecipeUpdate\RecipeUpdateUsecaseInterface::class,
            \packages\Web\Recepes\RecipeUpdate\RecipeUpdateInteractor::class
        );

        // shoppingThing
        $this->app->bind(
            \packages\Web\ShoppingThing\ShoppingThingRepositoryInterface::class,
            \packages\Web\ShoppingThing\ShoppingThingRepository::class
        );

        $this->app->bind(
            \packages\Web\ShoppingThing\index\ShoppingThingUsecaseInterface::class,
            \packages\Web\ShoppingThing\index\ShoppingThingInteractor::class
        );

        $this->app->bind(
            \packages\Web\ShoppingThing\recipeSelect\ShoppingThingRecipeSelectUsecaseInterface::class,
            \packages\Web\ShoppingThing\recipeSelect\ShoppingThingRecipeSelectInteractor::class
        );

        $this->app->bind(
            \packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoUsecaseInterface::class,
            \packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoInteractor::class
        );

        $this->app->bind(
            \packages\Web\ShoppingThing\insert\ShoppingThingInsertUsecaseInterface::class,
            \packages\Web\ShoppingThing\insert\ShoppingThingInsertInteractor::class
        );

        $this->app->bind(
            \packages\Web\ShoppingThing\edit\ShoppingThingEditUsecaseInterface::class,
            \packages\Web\ShoppingThing\edit\ShoppingThingEditInteractor::class
        );

        // Auth
        $this->app->bind(
            \packages\Web\Auth\AuthUsecaseInterface::class,
            \packages\Web\Auth\AuthInteractor::class
        );
        $this->app->bind(
            \packages\Web\Auth\AuthRepositoryInterface::class,
            \packages\Web\Auth\AuthRepository::class
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
