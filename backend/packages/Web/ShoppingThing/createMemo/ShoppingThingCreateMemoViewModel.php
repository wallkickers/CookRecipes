<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\createMemo;

use Illuminate\Support\Collection;

class ShoppingThingCreateMemoViewModel
{
    private Collection $ingredientsCollection;
    private Collection $ingredientCategories;

    public function __construct(
        Collection $ingredientsCollection,
        Collection $ingredientCategories
    ){
        $this->ingredientsCollection = $ingredientsCollection;
        $this->ingredientCategories = $ingredientCategories;
    }

    /**
     * @return Collection
     */
    public function getIngredientsCollection(): Collection
    {
        return $this->ingredientsCollection;
    }

    /**
     * @return Collection
     */
    public function getIngredientCategories(): Collection
    {
        return $this->ingredientCategories;
    }
}
