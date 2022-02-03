<?php

declare(strict_types=1);

namespace packages\Api\Recepes\RecipeDetail;

use Illuminate\Http\Request;

class RecipeDetailRequest extends Request
{
    /**
     * @var string $userId ユーザーID
     * @var string $recipeId レシピID
     */
    private $userId;
    private $recipeId;

    public function __construct(
        string $userId,
        string $recipeId,
    ) {
        $this->userId = $userId;
        $this->recipeId = $recipeId;
    }

    /**
     * @return string
     */
    public function getUserId(): string
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
