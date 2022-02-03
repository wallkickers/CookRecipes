<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeCreate;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class RecipeCreateResponse extends Response
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
