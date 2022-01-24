<?php

declare(strict_types=1);

namespace packages\Api\Recepes\RecipeCreate;

use packages\Api\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Api\Recepes\RecipeCreate\RecipeCreateRequest;
use packages\Api\Recepes\RecipeCreate\RecipeCreateResponse;
use packages\Api\Recepes\RecipeCreate\RecipeCreateUsecaseInterface;

class RecipeCreateInteractor implements RecipeCreateUsecaseInterface
{
    protected RecipeRepositoryInterface $recipeRepository;

    public function __construct(
        RecipeRepositoryInterface $recipeRepository
    ) {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param RecipeCreateRequest
     * @return RecipeCreateResponse
     */
    public function handle(RecipeCreateRequest $request): RecipeCreateResponse
    {
        $result = $this->recipeRepository
            ->insertOrUpdate(
                $request->getUserId(),
                $request->getRecipeUrl(),
                $request->getRecipeIngredient()
            );
        return new RecipeCreateResponse($result);
    }
}
