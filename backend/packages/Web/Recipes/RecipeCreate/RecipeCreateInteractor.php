<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeCreate;

use packages\Web\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Web\Recepes\RecipeCreate\RecipeCreateRequest;
use packages\Web\Recepes\RecipeCreate\RecipeCreateResponse;
use packages\Web\Recepes\RecipeCreate\RecipeCreateUsecaseInterface;

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
            ->insert(
                $request->getUserId(),
                $request->getRecipeTitle(),
                $request->getRecipeUrl(),
                $request->getRecipeIngredient()
            );
        return new RecipeCreateResponse($result);
    }
}
