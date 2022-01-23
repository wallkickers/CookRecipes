<?php

declare(strict_types=1);

namespace packages\Api\Recepes\RecipeCreate;

use Illuminate\Http\Request;

class RecipeCreateRequest extends Request
{
    /**
     * @var string $userId ユーザーID
     * @var string $recipeUrl レシピURL
     * @var string|null $recipeIngredient レシピの材料
     */
    private $userId;
    private $recipeUrl;
    private $recipeIngredient;

    public function __construct(
        string $userId,
        string $recipeUrl,
        string|null $recipeIngredient
    ){
        $this->userId = $userId;
        $this->recipeUrl = $recipeUrl;
        $this->recipeIngredient = $recipeIngredient;
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
