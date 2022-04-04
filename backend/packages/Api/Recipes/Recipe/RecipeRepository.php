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

        $recipeIngredientArray = $this->separateByLineFeedCodeToArray($recipeIngredient, "\r\n");
        $recipeIngredientArray = $this->separateStringAndIntToArray($recipeIngredientArray);

        if (count($recipeDataCollection) > 0) {
            DB::table('recipes')
                ->where('user_id', $userId)
                ->where('recipe_url', $recipeUrl)
                ->delete();
        }
        // create
        // recipeテーブル
        $recipesId = DB::table('recipes')
            ->insertGetId([
                'user_id' => $userId,
                'recipe_url' => $recipeUrl,
                'recipe_ingredients_text' => $recipeIngredient,
            ]);

        // create
        // recipe_ingredientsテーブル
        foreach ($recipeIngredientArray as $value) {
            DB::table('recipe_ingredients')
            ->insert([
                'recipe_id' => $recipesId,
                'ingredient_name' => $value[0],
                'ingredient_amount' => $value[1]
            ]);
        }

        $recipeDataCollection = DB::table('recipes')
            ->where(['id' => $recipesId])
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

    /**
     * 文字列を区切り文字で配列に分割
     * @param string $string 分割する文字列
     * @param string $separate 区切り文字列
     * @return array 分割後の配列
     */
    private function separateByLineFeedCodeToArray(string $string, string $separate): array
    {
        $array = explode($separate, trim($string));
        foreach ($array as &$value) {
            $value = trim($value);
        }
        unset($value);
        return $array;
    }

    /**
     * @param array $array 要素に文字列と数値を含む配列
     * @return array 0:文字　1:数値
     */
    private function separateStringAndIntToArray(array $array): array
    {
        $returnArray = [];
        foreach ($array as $key => $value) {
            $splitArray = preg_split("/([0-9])/", $value, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $returnArray[$key][] = $splitArray[0];
            unset($splitArray[0]);
            $returnArray[$key][] = implode($splitArray);
        }
        return $returnArray;
    }
}
