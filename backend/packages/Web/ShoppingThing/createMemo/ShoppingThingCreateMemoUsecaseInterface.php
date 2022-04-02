<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\createMemo;

use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoRequest;
use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoResponse;

interface ShoppingThingCreateMemoUsecaseInterface
{
    /**
     * @param ShoppingThingCreateMemoRequest
     * @return ShoppingThingCreateMemoResponse
     */
    public function handle(ShoppingThingCreateMemoRequest $request): ShoppingThingCreateMemoResponse;
}
