<?php

declare(strict_types=1);

namespace packages\Domain;

class Recipe
{
    private int $id;
    private int $userId;
    private string $recipeUrl;
    private string|null $recipeTitle;
    private string|null $recipeIngredientsText;
    private string|null $createdAt;
    private string|null $updatedAt;

    public function __construct(
        int $id,
        int $userId,
        string $recipeUrl,
        string|null $recipeTitle,
        string|null $recipeIngredientsText,
        string|null $createdAt,
        string|null $updatedAt
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->recipeUrl = $recipeUrl;
        $this->recipeTitle = $recipeTitle;
        $this->recipeIngredientsText = $recipeIngredientsText;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getrecipeUrl(): string
    {
        return $this->recipeUrl;
    }

    public function getrecipeTitle(): string|null
    {
        return $this->recipeTitle;
    }

    public function getRecipeIngredientsText(): string|null
    {
        return $this->recipeIngredientsText;
    }

    public function getCreatedAt(): string|null
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string|null
    {
        return $this->updatedAt;
    }
}
