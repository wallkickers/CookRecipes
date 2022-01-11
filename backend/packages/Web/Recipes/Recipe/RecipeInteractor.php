<?php

declare(strict_types=1);

namespace packages\Web\Recepes\Recipe;

use packages\Web\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Web\Recepes\Recipe\RecipeRequest;
use packages\Web\Recepes\Recipe\RecipeResponse;
use packages\Web\Recepes\Recipe\RecipeUsecaseInterface;

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
