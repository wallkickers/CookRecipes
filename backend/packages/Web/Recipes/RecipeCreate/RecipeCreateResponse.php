<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeCreate;

use Illuminate\Http\Response;
use packages\Domain\Recipe;

class RecipeCreateResponse extends Response
{
    private Recipe $recipe;

    public function __construct(
        Recipe $recipe
    ){
        $this->recipe = $recipe;
    }

    /**
     * @return Recipe
     */
    public function getRecipe(): Recipe
    {
        return $this->recipe;
    }
}
