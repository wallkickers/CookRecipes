<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\edit;

use packages\Web\Common\CommonRepositoryInterface;
use packages\Web\ShoppingThing\edit\ShoppingThingEditRequest;
use packages\Web\ShoppingThing\edit\ShoppingThingEditResponse;
use packages\Web\ShoppingThing\edit\ShoppingThingEditUsecaseInterface;
use packages\Web\ShoppingThing\ShoppingThingRepositoryInterface;

class ShoppingThingEditInteractor implements ShoppingThingEditUsecaseInterface
{
    protected ShoppingThingRepositoryInterface $shoppingThingRepository;
    protected CommonRepositoryInterface $commonRepository;

    public function __construct(
        ShoppingThingRepositoryInterface $shoppingThingRepository,
        CommonRepositoryInterface $commonRepository
    ) {
        $this->shoppingThingRepository = $shoppingThingRepository;
        $this->commonRepository = $commonRepository;
    }

    /**
     * @param ShoppingThingEditRequest
     * @return ShoppingThingEditResponse
     */
    public function handle(ShoppingThingEditRequest $request): ShoppingThingEditResponse
    {
        $ingredientsCollection = $this->shoppingThingRepository->getShoppingThingsIngredients($request->getUserId());
        $ingredientCategories = $this->commonRepository->getIngredientCategories();

        return new ShoppingThingEditResponse(
            $ingredientsCollection,
            $ingredientCategories
        );
    }
}
