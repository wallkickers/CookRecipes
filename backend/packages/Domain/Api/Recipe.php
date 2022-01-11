<?php

declare(strict_types=1);

namespace packages\Domain\Api;

class Recipe
{
    private int $userId;
    private string $recipeUrl;
    private string $recipeTitle;

    public function __construct(
        int $userId,
        string $recipeUrl,
        string $recipeTitle
    ) {
        $this->userId = $userId;
        $this->recipeUrl = $recipeUrl;
        $this->recipeTitle = $recipeTitle;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getrecipeUrl(): string
    {
        return $this->recipeUrl;
    }

    /**
     * @return string
     */
    public function getrecipeTitle(): string
    {
        return $this->recipeTitle;
    }
}
