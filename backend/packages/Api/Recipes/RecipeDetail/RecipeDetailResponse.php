<?php

declare(strict_types=1);

namespace packages\Api\Recepes\RecipeDetail;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class RecipeDetailResponse extends Response
{
    private Collection $RecipeDetailCollection;

    public function __construct(
        Collection $RecipeDetailCollection
    ){
        $this->RecipeDetailCollection = $RecipeDetailCollection;
    }

    /**
     * @return Collection
     */
    public function getRecipeDetailCollection(): Collection
    {
        return $this->RecipeDetailCollection;
    }
}
