<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeEdit;

use packages\Domain\Recipe;
use packages\Web\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Web\Recepes\RecipeEdit\RecipeEditRequest;
use packages\Web\Recepes\RecipeEdit\RecipeEditResponse;
use packages\Web\Recepes\RecipeEdit\RecipeEditUsecaseInterface;

class RecipeEditInteractor implements RecipeEditUsecaseInterface
{
    protected RecipeRepositoryInterface $recipeRepository;

    public function __construct(
        RecipeRepositoryInterface $recipeRepository
    ) {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param RecipeEditRequest
     * @return RecipeEditResponse
     */
    public function handle(RecipeEditRequest $request): RecipeEditResponse
    {
        $recipeData = $this->recipeRepository->getRecipe($request->getUserId(), $request->getRecipeId());
        $recipeIngredientsCollection = $this->recipeRepository->getRecipeIngredients($request->getRecipeId());
        $ingredientCategories = $this->recipeRepository->getIngredientCategories();

        return new RecipeEditResponse(
            new Recipe (
                $recipeData->id,
                $recipeData->user_id,
                $recipeData->recipe_url,
                $recipeData->recipe_title,
                $recipeIngredientsCollection->all(),
                null,
                null
            ),
            $ingredientCategories
        );
    }
}
