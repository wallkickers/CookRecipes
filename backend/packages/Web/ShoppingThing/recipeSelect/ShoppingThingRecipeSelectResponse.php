<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\recipeSelect;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class ShoppingThingRecipeSelectResponse extends Response
{
    private Collection $recipeCollection;

    public function __construct(
        Collection $recipeCollection
    ){
        $this->recipeCollection = $recipeCollection;
    }

    /**
     * @return Collection
     */
    public function getRecipeCollection(): Collection
    {
        return $this->recipeCollection;
    }
}
