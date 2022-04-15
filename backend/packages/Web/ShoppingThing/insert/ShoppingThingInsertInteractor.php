<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\insert;

use packages\Web\ShoppingThing\ShoppingThingRepositoryInterface;
use packages\Web\ShoppingThing\insert\ShoppingThingInsertRequest;
use packages\Web\ShoppingThing\insert\ShoppingThingInsertResponse;
use packages\Web\ShoppingThing\insert\ShoppingThingInsertUsecaseInterface;
use packages\Web\Common\CommonRepositoryInterface;

class ShoppingThingInsertInteractor implements ShoppingThingInsertUsecaseInterface
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
