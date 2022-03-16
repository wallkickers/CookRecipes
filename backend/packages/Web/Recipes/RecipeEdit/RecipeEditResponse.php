<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeEdit;

use Illuminate\Http\Response;
use packages\Domain\Recipe;
use Illuminate\Support\Collection;

class RecipeEditResponse extends Response
{
    private Recipe $recipeData;
    private Collection $ingredientCategories;

    public function __construct(
        Recipe $recipeData,
        Collection $ingredientCategories,
    ){
        $this->recipeData = $recipeData;
        $this->ingredientCategories = $ingredientCategories;
    }

    /**
     * @return Recipe
     */
    public function getRecipeData(): Recipe
    {
        return $this->recipeData;
    }

    /**
     * @return Collection
     */
    public function getIngredientCategories(): Collection
    {
        return $this->ingredientCategories;
    }
}
