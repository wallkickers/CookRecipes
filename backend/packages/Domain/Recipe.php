<?php

declare(strict_types=1);

namespace packages\Domain;

class Recipe
{
    private int $id;
    private int $userId;
    private string $recipeUrl;
    private string $recipeTitle;
    private string $recipeIngredientsText;
    private string $createdAt;
    private string $updatedAt;

    public function __construct(
        int $id,
        int $userId,
        string $recipeUrl,
        string $recipeTitle,
        string $recipeIngredientsText,
        string $createdAt,
        string $updatedAt
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->recipeUrl = $recipeUrl;
        $this->recipeTitle = $recipeTitle;
        $this->recipeIngredientsText = $recipeIngredientsText;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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

    /**
     * @return string
     */
    public function getRecipeIngredientsText(): string
    {
        return $this->recipeIngredientsText;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }
}
