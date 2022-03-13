<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeDetail;

use packages\Domain\Recipe;
use packages\Web\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Web\Recepes\RecipeDetail\RecipeDetailRequest;
use packages\Web\Recepes\RecipeDetail\RecipeDetailResponse;
use packages\Web\Recepes\RecipeDetail\RecipeDetailUsecaseInterface;

class RecipeDetailInteractor implements RecipeDetailUsecaseInterface
{
    protected RecipeRepositoryInterface $recipeRepository;

    public function __construct(
        RecipeRepositoryInterface $recipeRepository
    ) {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param RecipeDetailRequest
     * @return RecipeDetailResponse
     */
    public function handle(RecipeDetailRequest $request): RecipeDetailResponse
    {
        $recipeData = $this->recipeRepository->getRecipe($request->getUserId(), $request->getRecipeId());
        $recipeIngredientsCollection = $this->recipeRepository->getRecipeIngredients($request->getRecipeId());

        return new RecipeDetailResponse(
            new Recipe (
            $recipeData->id,
            $recipeData->user_id,
            $recipeData->recipe_url,
            $recipeData->recipe_title,
            $recipeIngredientsCollection->all(),
            null,
            null
        ));
    }
}
