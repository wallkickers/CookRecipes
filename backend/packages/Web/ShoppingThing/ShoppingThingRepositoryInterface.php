<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing;

interface ShoppingThingRepositoryInterface
{
    public function get(int $userId);

    public function getShoppingThingsIngredients(
        int $userId
    );

    public function insertShoppingThingsIngredients(
        int $userId,
        array|null $shoppingThingIngredients
    );

    public function deleteShoppingThingsIngredients(
        int $userId
    );
}
