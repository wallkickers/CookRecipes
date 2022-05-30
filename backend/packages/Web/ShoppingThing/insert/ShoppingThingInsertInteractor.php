<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\insert;

use packages\Web\ShoppingThing\ShoppingThingRepositoryInterface;
use packages\Web\ShoppingThing\insert\ShoppingThingInsertRequest;
use packages\Web\ShoppingThing\insert\ShoppingThingInsertResponse;
use packages\Web\ShoppingThing\insert\ShoppingThingInsertUsecaseInterface;
use packages\Web\MasterData\MasterDataRepositoryInterface;

class ShoppingThingInsertInteractor implements ShoppingThingInsertUsecaseInterface
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
     * @param ShoppingThingInsertRequest
     * @return ShoppingThingInsertResponse
     */
    public function handle(ShoppingThingInsertRequest $request): ShoppingThingInsertResponse
    {
        $this->shoppingThingRepository
            ->deleteShoppingThingsIngredients(
                $request->getUserId()
            );

        $this->shoppingThingRepository
            ->insertShoppingThingsIngredients(
                $request->getUserId(),
                $request->getIngredients()
            );
        return new ShoppingThingInsertResponse();
    }
}
