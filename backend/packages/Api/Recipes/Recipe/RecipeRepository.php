<?php

declare(strict_types=1);

namespace packages\Api\Recepes\Recipe;

use DB;
use Illuminate\Support\Collection;
use packages\Api\Recepes\Recipe\RecipeRepositoryInterface;
use packages\Domain\Api\Recipe;

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
                $recipeData->user_id,
                $recipeData->recipe_url,
                $recipeData->recipe_title,
            );
        }
        return collect($recipe);
    }

    /**
     * @param string $userId ユーザーID
     * @param string $recipeUrl レシピURL
     * @param string|null $recipeIngredient レシピの材料
     * @return Collection
     */
    public function insertOrUpdate(
        string $userId,
        string $recipeUrl,
        string|null $recipeIngredient
    ): Collection {
        $recipeDataCollection = DB::table('recipes')
            ->where('user_id', $userId)
            ->where('recipe_url', $recipeUrl)
            ->get();
        if (count($recipeDataCollection) > 0) {
            // update
            DB::table('recipes')
                ->where('user_id', $userId)
                ->where('recipe_url', $recipeUrl)
                ->update(['recipe_ingredients_text' => $recipeIngredient]);
            $recipeDataCollection = DB::table('recipes')
                ->where('user_id', $userId)
                ->where('recipe_url', $recipeUrl)
                ->get();
        } else {
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
        }
        return $recipeDataCollection;
    }
}
