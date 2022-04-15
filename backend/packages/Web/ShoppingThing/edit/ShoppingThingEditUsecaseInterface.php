<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\edit;

use packages\Web\ShoppingThing\edit\ShoppingThingEditRequest;
use packages\Web\ShoppingThing\edit\ShoppingThingEditResponse;

interface ShoppingThingEditUsecaseInterface
{
    /**
     * @param ShoppingThingEditRequest
     * @return ShoppingThingEditResponse
     */
    public function handle(ShoppingThingEditRequest $request): ShoppingThingEditResponse;
}
