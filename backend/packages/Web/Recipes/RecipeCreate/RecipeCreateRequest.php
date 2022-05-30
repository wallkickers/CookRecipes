<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeCreate;

use Illuminate\Http\Request;

class RecipeCreateRequest extends Request
{
    /**
     * @var int $userId ユーザーID
     * @var string $recipeTitle レシピタイトル
     * @var string $recipeUrl レシピURL
     * @var string|null $recipeIngredient レシピの材料
     */
    private $userId;
    private $recipeUrl;
    private $recipeTitle;
    private $recipeIngredient;

    public function __construct(
        int $userId,
        string $recipeTitle,
        string $recipeUrl,
        string|null $recipeIngredient
    ){
        $this->userId = $userId;
        $this->recipeTitle = $recipeTitle;
        $this->recipeUrl = $recipeUrl;
        $this->recipeIngredient = $recipeIngredient;
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
    public function getRecipeTitle(): string
    {
        return $this->recipeTitle;
    }

    /**
     * @return string
     */
    public function getRecipeUrl(): string
    {
        return $this->recipeUrl;
    }

    /**
     * @return string
     */
    public function getRecipeIngredient(): string|null
    {
        return $this->recipeIngredient;
    }
}
