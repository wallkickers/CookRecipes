<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\index;

use packages\Web\ShoppingThing\index\ShoppingThingRequest;
use packages\Web\ShoppingThing\index\ShoppingThingResponse;

interface ShoppingThingUsecaseInterface
{
    /**
     * @param ShoppingThingRequest
     * @return ShoppingThingResponse
     */
    public function handle(ShoppingThingRequest $request): ShoppingThingResponse;
}
