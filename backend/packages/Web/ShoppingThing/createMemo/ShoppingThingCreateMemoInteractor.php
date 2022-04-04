<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\createMemo;

use packages\Web\Common\CommonRepositoryInterface;
use packages\Web\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoRequest;
use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoResponse;
use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoUsecaseInterface;
use packages\Web\ShoppingThing\ShoppingThingRepositoryInterface;

class ShoppingThingCreateMemoInteractor implements ShoppingThingCreateMemoUsecaseInterface
{
    protected CommonRepositoryInterface $commonRepository;
    protected RecipeRepositoryInterface $recipeRepositoryInterface;

    public function __construct(
        CommonRepositoryInterface $commonRepository,
        RecipeRepositoryInterface $recipeRepositoryInterface
    ) {
        $this->commonRepository = $commonRepository;
        $this->recipeRepositoryInterface = $recipeRepositoryInterface;
    }

    /**
     * @param ShoppingThingCreateMemoRequest
     * @return ShoppingThingCreateMemoResponse
     */
    public function handle(ShoppingThingCreateMemoRequest $request): ShoppingThingCreateMemoResponse
    {
        $ingredientsCollection = $this->recipeRepositoryInterface->getIngredientsFromRecipes($request->getRecipes());
        $ingredientCategories = $this->commonRepository->getIngredientCategories();

        return new ShoppingThingCreateMemoResponse(
            $ingredientsCollection,
            $ingredientCategories
        );
    }
}
