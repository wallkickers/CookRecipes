<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeDetail;

use Illuminate\Http\Response;
use packages\Domain\Recipe;
use Illuminate\Support\Collection;

class RecipeDetailResponse extends Response
{
    private Recipe $recipeData;

    public function __construct(
        Recipe $recipeData
    ){
        $this->recipeData = $recipeData;
    }

    /**
     * @return Recipe
     */
    public function getRecipeData(): Recipe
    {
        return $this->recipeData;
    }
}
