<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeDetail;

use Illuminate\Support\Collection;
use packages\Domain\Recipe;

class RecipeDetailViewModel
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
