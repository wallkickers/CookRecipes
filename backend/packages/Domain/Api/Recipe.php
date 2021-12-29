<?php

declare(strict_types=1);

namespace packages\Domain\Api;

class Recipe
{
    public function __construct(
        int $userId,
        string $recipeUrl
    ) {
        $this->userId = $userId;
        $this->recipeUrl = $recipeUrl;
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
}
