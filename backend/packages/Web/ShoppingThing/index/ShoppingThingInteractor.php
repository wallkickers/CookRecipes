<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\index;

use packages\Web\ShoppingThing\ShoppingThingRepositoryInterface;
use packages\Web\ShoppingThing\index\ShoppingThingRequest;
use packages\Web\ShoppingThing\index\ShoppingThingResponse;
use packages\Web\ShoppingThing\index\ShoppingThingUsecaseInterface;
use packages\Web\Common\CommonRepositoryInterface;

class ShoppingThingInteractor implements ShoppingThingUsecaseInterface
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
     * @param ShoppingThingRequest
     * @return ShoppingThingResponse
     */
    public function handle(ShoppingThingRequest $request): ShoppingThingResponse
    {
        $shoppingThing = $this->shoppingThingRepository->get($request->getUserId());
        $ingredientCategories = $this->commonRepository->getIngredientCategories();
        return new ShoppingThingResponse(
            $shoppingThing,
            $ingredientCategories
        );
    }
}
