<?php

declare(strict_types=1);

namespace packages\Api\Recepes\Recipe;

interface RecipeRepositoryInterface
{
    public function find(string $userId);

    public function insertOrUpdate(
        string $userId,
        string $recipeUrl,
        string|null $recipeIngredient
    );
}
