<?php

declare(strict_types=1);

namespace packages\Web\Recepes\Recipe;

interface RecipeRepositoryInterface
{
    public function find(int $userId);

    public function insert(
        int $userId,
        string $recipeTitle,
        string $recipeUrl,
        string|null $recipeIngredient
    );

    public function update(
        string $recipeId,
        int $userId,
        string|null $recipeTitle,
        string $recipeUrl,
        array|null $recipeIngredients
    );

    public function getRecipe(int $userId, string $recipeId);

    public function getRecipeIngredients(string $recipeId);

    public function getIngredientsFromRecipes(array $recipes);

    public function getIngredientCategories();

    public function getRecipeCollection(int $userId);
}
