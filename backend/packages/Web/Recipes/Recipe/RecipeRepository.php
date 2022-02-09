<?php

declare(strict_types=1);

namespace packages\Web\Recepes\Recipe;

use App\Http\Trait\ApiBaseTrait;
use Illuminate\Support\Collection;
use packages\Domain\Recipe;
use packages\Web\Recepes\Recipe\RecipeRepositoryInterface;

class RecipeRepository implements RecipeRepositoryInterface
{
    use ApiBaseTrait;

    /**
     * @param string $userId ユーザーID
     * @return Collection
     */
    public function find(string $userId): Collection
    {
        $recipeDataCollection = $this->get('/api/recipes');
        $recipe = [];
        foreach ($recipeDataCollection->original as $recipeData) {
            $recipe[] = new Recipe(
                $recipeData->getId(),
                $recipeData->getUserId(),
                $recipeData->getrecipeUrl(),
                $recipeData->getrecipeTitle(),
                $recipeData->getRecipeIngredientsText(),
                $recipeData->getCreatedAt(),
                $recipeData->getUpdatedAt()
            );
        }
        return collect($recipe);
    }

    /**
     * @param string $userId ユーザーID
     * @return Recipe
     */
    public function insertOrUpdate(
        string $userId,
        string $recipeUrl,
        string|null $recipeIngredient
    ): Recipe {
        $params['userId'] = $userId;
        $params['recipeUrl'] = $recipeUrl;
        $params['recipeIngredient'] = $recipeIngredient;
        $recipe = $this->post(
            '/api/recipe/createUpdate',
            $params
        );
        return $recipe->original;
    }

    /**
     * @param string $userId ユーザーID
     * @param string $recipeId レシピID
     * @return Collection
     */
    public function getRecipe(string $userId, string $recipeId)
    {
        $params = [];
        $params['userId'] = $userId;

        // TODO: APIへのGETがうまくいかないので暫定対応
        // $recipe = $this->get(
        //     '/api/recipe',
        //     $params,
        // );
        $recipe = new Recipe(
            14,
            1,
            'https://cookpad.com/recipe/3815181',
            null,
            '牛肉バラ肉200g
            玉葱【中】1/2
            にんじん25g
            ピーマン【中】2個
            シメジ25g',
            null,
            null
        );
        return $recipe;
    }
}
