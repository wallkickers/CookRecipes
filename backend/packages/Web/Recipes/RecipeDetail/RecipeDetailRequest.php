<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeDetail;

use Illuminate\Http\Request;

class RecipeDetailRequest extends Request
{
    /**
     * @var int $userId ユーザーID
     * @var string $recipeId レシピID
     */
    private $userId;
    private $recipeId;

    public function __construct(
        int $userId,
        string $recipeId,
    ) {
        $this->userId = $userId;
        $this->recipeId = $recipeId;
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
    public function getRecipeId(): string
    {
        return $this->recipeId;
    }
}
