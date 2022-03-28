<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing;

interface ShoppingThingRepositoryInterface
{
    public function get(string $userId);

    public function getShoppingThingsIngredients(
        string $userId
    );

    public function insertShoppingThingsIngredients(
        string $userId,
        array|null $shoppingThingIngredients
    );

    public function deleteShoppingThingsIngredients(
        string $userId
    );

    // public function update(
    //     string $ShoppingThingId,
    //     string $userId,
    //     string|null $ShoppingThingTitle,
    //     string $ShoppingThingUrl,
    //     array|null $ShoppingThingIngredients
    // );

    // public function getShoppingThing(string $userId, string $ShoppingThingId);

    // public function getShoppingThingIngredients(string $ShoppingThingId);

    // public function getIngredientCategories();
}
