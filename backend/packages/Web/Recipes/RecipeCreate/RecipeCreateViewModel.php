<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeCreate;

use Illuminate\Support\Collection;

class RecipeCreateViewModel
{
    private Collection $RecipeCreateCollection;

    public function __construct(
        Collection $RecipeCreateCollection
    ){
        $this->RecipeCreateCollection = $RecipeCreateCollection;
    }

    /**
     * @return Collection
     */
    public function getRecipeCreateCollection(): Collection
    {
        return $this->RecipeCreateCollection;
    }
}
