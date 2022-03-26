<?php

declare(strict_types=1);

namespace packages\Domain;

class ShoppingThing
{
    private int $id;
    private int $userId;
    private int|null $ingredientCategoryId;
    private string $ingredientName;
    private string|null $ingredientAmount;

    public function __construct(
        int $id,
        int $userId,
        int|null $ingredientCategoryId,
        string $ingredientName,
        string|null $ingredientAmount
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->ingredientCategoryId = $ingredientCategoryId;
        $this->ingredientName = $ingredientName;
        $this->ingredientAmount = $ingredientAmount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getIngredientCategoryId(): int|null
    {
        return $this->ingredientCategoryId;
    }

    public function getIngredientName(): string
    {
        return $this->ingredientName;
    }

    public function getIngredientAmount(): string|null
    {
        return $this->ingredientAmount;
    }
}
