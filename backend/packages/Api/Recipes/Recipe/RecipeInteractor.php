<?php

declare(strict_types=1);

namespace packages\Api\Recepes\Recipe;

use packages\Api\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Api\Recepes\Recipe\RecipeRequest;
use packages\Api\Recepes\Recipe\RecipeResponse;
use packages\Api\Recepes\Recipe\RecipeUsecaseInterface;

class RecipeInteractor implements RecipeUsecaseInterface
{
    protected RecipeRepositoryInterface $recipeRepository;

    public function __construct(
        RecipeRepositoryInterface $recipeRepository
    ) {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param RecipeRequest
     * @return RecipeResponse
     */
    public function handle(RecipeRequest $request): RecipeResponse
    {
        $recipes = $this->recipeRepository->find($request->getUserId());
        return new RecipeResponse($recipes);
    }
}
