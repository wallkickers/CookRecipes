<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\insert;

use packages\Web\ShoppingThing\insert\ShoppingThingInsertRequest;
use packages\Web\ShoppingThing\insert\ShoppingThingInsertResponse;

interface ShoppingThingInsertUsecaseInterface
{
    /**
     * @param ShoppingThingInsertRequest
     * @return ShoppingThingInsertResponse
     */
    public function handle(ShoppingThingInsertRequest $request): ShoppingThingInsertResponse;
}
