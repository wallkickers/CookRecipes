<?php

declare(strict_types=1);

namespace packages\Api\Recepes\Recipe;

interface RecipeRepositoryInterface
{
    public function find(string $userId);
}
