<?php

declare(strict_types=1);

namespace packages\Api\Recepes\RecipeDetail;

use packages\Api\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Api\Recepes\RecipeDetail\RecipeDetailRequest;
use packages\Api\Recepes\RecipeDetail\RecipeDetailResponse;
use packages\Api\Recepes\RecipeDetail\RecipeDetailUsecaseInterface;

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
        $result = $this->recipeRepository
            ->insertOrUpdate(
                $request->getUserId(),
                $request->getRecipeUrl(),
                $request->getRecipeIngredient()
            );
        return new RecipeDetailResponse($result);
    }
}
