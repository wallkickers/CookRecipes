<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\recipeSelect;

use packages\Web\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Web\ShoppingThing\recipeSelect\ShoppingThingRecipeSelectRequest;
use packages\Web\ShoppingThing\recipeSelect\ShoppingThingRecipeSelectResponse;
use packages\Web\ShoppingThing\recipeSelect\ShoppingThingRecipeSelectUsecaseInterface;

class ShoppingThingRecipeSelectInteractor implements ShoppingThingRecipeSelectUsecaseInterface
{
    protected RecipeRepositoryInterface $recipeRepository;

    public function __construct(
        RecipeRepositoryInterface $recipeRepository
    ) {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param ShoppingThingRecipeSelectRequest
     * @return ShoppingThingRecipeSelectResponse
     */
    public function handle(ShoppingThingRecipeSelectRequest $request): ShoppingThingRecipeSelectResponse
    {
        $recipeCollection = $this->recipeRepository->getRecipeCollection($request->getUserId());
        return new ShoppingThingRecipeSelectResponse(
            $recipeCollection
        );
    }
}
