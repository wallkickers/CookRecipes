<?php

declare(strict_types=1);

namespace packages\Api\Recepes\Recipe;

use DB;
use Illuminate\Support\Collection;
use packages\Api\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Domain\Recipe;

class RecipeRepository implements RecipeRepositoryInterface
{
    /**
     * @param string $userId ユーザーID
     * @return Collection
     */
    public function find(string $userId): Collection
    {
        $recipeDataCollection = DB::table('recipes')->where('user_id', $userId)->get();
        $recipe = [];
        foreach ($recipeDataCollection as $recipeData) {
            $recipe[] = new Recipe(
                $recipeData->id,
                $recipeData->user_id,
                $recipeData->recipe_url,
                $recipeData->recipe_title,
                $recipeData->recipe_ingredients_text,
                $recipeData->created_at,
                $recipeData->updated_at
            );
        }
        return collect($recipe);
    }

    /**
     * @param string $userId ユーザーID
     * @param string $recipeUrl レシピURL
     * @param string|null $recipeIngredient レシピの材料
     * @return Recipe
     */
    public function insertOrUpdate(
        string $userId,
        string $recipeUrl,
        string|null $recipeIngredient
    ): Recipe {
        $recipeDataCollection = DB::table('recipes')
            ->where('user_id', $userId)
            ->where('recipe_url', $recipeUrl)
            ->get();

        if (count($recipeDataCollection) > 0) {
            DB::table('recipes')
                ->where('user_id', $userId)
                ->where('recipe_url', $recipeUrl)
                ->delete();
        }
        // create
        $id = DB::table('recipes')
            ->insertGetId([
                'user_id' => $userId,
                'recipe_url' => $recipeUrl,
                'recipe_ingredients_text' => $recipeIngredient,
            ]);
        $recipeDataCollection = DB::table('recipes')
            ->where(['id' => $id])
            ->get();
        $recipeData = $recipeDataCollection[0];
        $recipe = new Recipe(
            $recipeData->id,
            $recipeData->user_id,
            $recipeData->recipe_url,
            $recipeData->recipe_title,
            $recipeData->recipe_ingredients_text,
            $recipeData->created_at,
            $recipeData->updated_at
        );
        return $recipe;
    }
}
