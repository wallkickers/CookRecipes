<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\createMemo;

use packages\Web\MasterData\MasterDataRepositoryInterface;
use packages\Web\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoRequest;
use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoResponse;
use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoUsecaseInterface;
use packages\Web\ShoppingThing\ShoppingThingRepositoryInterface;

class ShoppingThingCreateMemoInteractor implements ShoppingThingCreateMemoUsecaseInterface
{
    protected MasterDataRepositoryInterface $masterDataRepository;
    protected RecipeRepositoryInterface $recipeRepositoryInterface;

    public function __construct(
        MasterDataRepositoryInterface $masterDataRepository,
        RecipeRepositoryInterface $recipeRepositoryInterface
    ) {
        $this->masterDataRepository = $masterDataRepository;
        $this->recipeRepositoryInterface = $recipeRepositoryInterface;
    }

    /**
     * @param ShoppingThingCreateMemoRequest
     * @return ShoppingThingCreateMemoResponse
     */
    public function handle(ShoppingThingCreateMemoRequest $request): ShoppingThingCreateMemoResponse
    {
        $ingredientsCollection = $this->recipeRepositoryInterface->getIngredientsFromRecipes($request->getRecipes());
        $ingredientCategories = $this->masterDataRepository->getIngredientCategories();

        return new ShoppingThingCreateMemoResponse(
            $ingredientsCollection,
            $ingredientCategories
        );
    }
}
