<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeUpdate;

use Illuminate\Support\Collection;

class RecipeUpdateViewModel
{
    private Collection $recipeUpdateCollection;

    public function __construct(
        Collection $recipeUpdateCollection
    ){
        $this->recipeUpdateCollection = $recipeUpdateCollection;
    }

    /**
     * @return Collection
     */
    public function getRecipeUpdateCollection(): Collection
    {
        return $this->recipeUpdateCollection;
    }
}
