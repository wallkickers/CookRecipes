<?php

declare(strict_types=1);

namespace packages\Web\Recepes\Recipe;

interface RecipeRepositoryInterface
{
    public function find(string $userId);

    public function insertOrUpdate(
        string $userId,
        string $recipeUrl,
        string|null $recipeIngredient
    );

    public function getRecipe(string $userId, string $recipeId);
}
