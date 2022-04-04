<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeUpdate;

use Illuminate\Http\Request;

class RecipeUpdateRequest extends Request
{
    /**
     * @var string $recipeId レシピID
     * @var string $userId ユーザーID
     * @var string|null $recipeTitle レシピタイトル
     * @var string $recipeUrl レシピURL
     * @var array|null $recipeIngredients レシピの材料
     */
    private $recipeId;
    private $userId;
    private $recipeTitle;
    private $recipeUrl;
    private $recipeIngredients;

    public function __construct(
        string $recipeId,
        string $userId,
        string|null $recipeTitle,
        string $recipeUrl,
        array|null $recipeIngredients
    ){
        $this->recipeId = $recipeId;
        $this->userId = $userId;
        $this->recipeTitle = $recipeTitle;
        $this->recipeUrl = $recipeUrl;
        $this->recipeIngredients = $recipeIngredients;
    }

    /**
     * @return string
     */
    public function getRecipeId(): string
    {
        return $this->recipeId;
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
    public function getrecipeTitle(): string|null
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
     * @return array
     */
    public function getRecipeIngredients(): array|null
    {
        return $this->recipeIngredients;
    }
}
