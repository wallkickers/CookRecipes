<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\index;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class ShoppingThingResponse extends Response
{
    private Collection $shoppingThingCollection;
    private Collection $ingredientCategories;

    public function __construct(
        Collection $shoppingThingCollection,
        Collection $ingredientCategories
    ){
        $this->shoppingThingCollection = $shoppingThingCollection;
        $this->ingredientCategories = $ingredientCategories;
    }

    /**
     * @return Collection
     */
    public function getShoppingThingCollection(): Collection
    {
        return $this->shoppingThingCollection;
    }

    /**
     * @return Collection
     */
    public function getIngredientCategories(): Collection
    {
        return $this->ingredientCategories;
    }
}
