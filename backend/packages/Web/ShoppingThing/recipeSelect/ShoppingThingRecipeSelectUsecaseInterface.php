<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\recipeSelect;

use packages\Web\ShoppingThing\recipeSelect\ShoppingThingRecipeSelectRequest;
use packages\Web\ShoppingThing\recipeSelect\ShoppingThingRecipeSelectResponse;

interface ShoppingThingRecipeSelectUsecaseInterface
{
    /**
     * @param ShoppingThingRecipeSelectRequest
     * @return ShoppingThingRecipeSelectResponse
     */
    public function handle(ShoppingThingRecipeSelectRequest $request): ShoppingThingRecipeSelectResponse;
}
