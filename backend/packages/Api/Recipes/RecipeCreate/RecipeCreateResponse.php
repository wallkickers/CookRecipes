<?php

declare(strict_types=1);

namespace packages\Api\Recepes\RecipeCreate;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class RecipeCreateResponse extends Response
{
    private Collection $recipeCreateCollection;

    public function __construct(
        Collection $recipeCreateCollection
    ){
        $this->recipeCreateCollection = $recipeCreateCollection;
    }

    /**
     * @return Collection
     */
    public function getrecipeCreateCollection(): Collection
    {
        return $this->recipeCreateCollection;
    }
}
