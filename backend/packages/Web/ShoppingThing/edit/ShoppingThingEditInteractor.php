<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\edit;

use packages\Web\MasterData\MasterDataRepositoryInterface;
use packages\Web\ShoppingThing\edit\ShoppingThingEditRequest;
use packages\Web\ShoppingThing\edit\ShoppingThingEditResponse;
use packages\Web\ShoppingThing\edit\ShoppingThingEditUsecaseInterface;
use packages\Web\ShoppingThing\ShoppingThingRepositoryInterface;

class ShoppingThingEditInteractor implements ShoppingThingEditUsecaseInterface
{
    protected ShoppingThingRepositoryInterface $shoppingThingRepository;
    protected MasterDataRepositoryInterface $masterDataRepository;

    public function __construct(
        ShoppingThingRepositoryInterface $shoppingThingRepository,
        MasterDataRepositoryInterface $masterDataRepository
    ) {
        $this->shoppingThingRepository = $shoppingThingRepository;
        $this->masterDataRepository = $masterDataRepository;
    }

    /**
     * @param ShoppingThingEditRequest
     * @return ShoppingThingEditResponse
     */
    public function handle(ShoppingThingEditRequest $request): ShoppingThingEditResponse
    {
        $ingredientsCollection = $this->shoppingThingRepository->getShoppingThingsIngredients($request->getUserId());
        $ingredientCategories = $this->masterDataRepository->getIngredientCategories();

        return new ShoppingThingEditResponse(
            $ingredientsCollection,
            $ingredientCategories
        );
    }
}
