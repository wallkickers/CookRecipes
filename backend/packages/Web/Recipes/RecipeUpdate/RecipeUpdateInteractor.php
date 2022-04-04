<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeUpdate;

use packages\Web\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Web\Recepes\RecipeUpdate\RecipeUpdateRequest;
use packages\Web\Recepes\RecipeUpdate\RecipeUpdateResponse;
use packages\Web\Recepes\RecipeUpdate\RecipeUpdateUsecaseInterface;

class RecipeUpdateInteractor implements RecipeUpdateUsecaseInterface
{
    protected RecipeRepositoryInterface $recipeRepository;

    public function __construct(
        RecipeRepositoryInterface $recipeRepository
    ) {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param RecipeUpdateRequest
     * @return RecipeUpdateResponse
     */
    public function handle(RecipeUpdateRequest $request): RecipeUpdateResponse
    {
        $result = $this->recipeRepository
            ->update(
                $request->getRecipeId(),
                $request->getUserId(),
                $request->getrecipeTitle(),
                $request->getRecipeUrl(),
                $request->getRecipeIngredients(),
            );
        return new RecipeUpdateResponse($result);
    }
}
