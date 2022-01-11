<?php

declare(strict_types=1);

namespace packages\Web\Recepes\Recipe;

use Illuminate\Support\Collection;

class RecipeViewModel
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
