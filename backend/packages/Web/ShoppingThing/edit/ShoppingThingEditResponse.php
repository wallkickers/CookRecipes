<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\edit;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class ShoppingThingEditResponse extends Response
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
