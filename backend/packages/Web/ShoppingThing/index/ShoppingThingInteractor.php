<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\index;

use packages\Web\ShoppingThing\ShoppingThingRepositoryInterface;
use packages\Web\ShoppingThing\index\ShoppingThingRequest;
use packages\Web\ShoppingThing\index\ShoppingThingResponse;
use packages\Web\ShoppingThing\index\ShoppingThingUsecaseInterface;
use packages\Web\MasterData\MasterDataRepositoryInterface;

class ShoppingThingInteractor implements ShoppingThingUsecaseInterface
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
     * @param ShoppingThingRequest
     * @return ShoppingThingResponse
     */
    public function handle(ShoppingThingRequest $request): ShoppingThingResponse
    {
        $shoppingThing = $this->shoppingThingRepository->get($request->getUserId());
        $ingredientCategories = $this->masterDataRepository->getIngredientCategories();
        return new ShoppingThingResponse(
            $shoppingThing,
            $ingredientCategories
        );
    }
}
