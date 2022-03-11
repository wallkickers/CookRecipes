<?php

declare(strict_types=1);

namespace packages\Web\Recepes\Recipe;

use App\Http\Trait\ApiBaseTrait;
use DB;
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
        $recipe = [];
        $recipeDataCollection = DB::table('recipes')
            ->select(
                'id',
                'user_id',
                'recipe_url',
                'recipe_title'
            )
            ->where('user_id', $userId)->get();
        foreach ($recipeDataCollection as $recipeData) {
            $recipe[] = new Recipe(
                $recipeData->id,
                $recipeData->user_id,
                $recipeData->recipe_url,
                $recipeData->recipe_title,
                null,
                null,
                null
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
    public function insert(
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
        // recipeテーブル
        $recipesId = DB::table('recipes')
            ->insertGetId([
                'user_id' => $userId,
                'recipe_url' => $recipeUrl,
                'recipe_title' => $this->getTitleFromUrl($recipeUrl),
                'recipe_ingredients_text' => $recipeIngredient,
            ]);

        $recipeIngredientArray = $this->separateByLineFeedCodeToArray($recipeIngredient, "\r\n");
        $recipeIngredientArray = $this->separateStringAndIntToArray($recipeIngredientArray);

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

        $recipeIngredientsDataCollection = DB::table('recipe_ingredients')
            ->where(['recipe_id' => $recipesId])
            ->get();

        $recipeData = $recipeDataCollection[0];
        $recipe = new Recipe(
            $recipeData->id,
            $recipeData->user_id,
            $recipeData->recipe_url,
            $recipeData->recipe_title,
            $recipeIngredientsDataCollection->toArray(),
            $recipeData->created_at,
            $recipeData->updated_at
        );
        return $recipe;
    }

    /**
     * @var string $userId ユーザーID
     * @var string|null $recipeTitle レシピタイトル
     * @var string $recipeUrl レシピURL
     * @var array|null $recipeIngredients レシピの材料
     * @return Recipe
     */
    public function update(
        string $recipeId,
        string $userId,
        string|null $recipeTitle,
        string $recipeUrl,
        array|null $recipeIngredients
    ): Recipe {
        $recipeDataCollection = DB::table('recipes')
            ->where('id', $recipeId)
            ->where('user_id', $userId)
            ->get();

        $recipeIngredientsDataCollection = DB::table('recipe_ingredients')
            ->where('recipe_id', $recipeId)
            ->get();

        if (count($recipeDataCollection) > 0) {
            DB::table('recipes')
                ->where('id', $recipeId)
                ->where('user_id', $userId)
                ->update([
                    'recipe_url' => $recipeUrl,
                    'recipe_title' => $recipeTitle,
                ]);
        }

        if (count($recipeIngredientsDataCollection)>0) {
            DB::table('recipe_ingredients')
                ->where('recipe_id', $recipeId)
                ->delete();
        }

        foreach ($recipeIngredients as $value) {
            DB::table('recipe_ingredients')
            ->insert([
                'recipe_id' => $recipeId,
                'ingredient_category_id' => $value['category'],
                'ingredient_name' => $value['name'],
                'ingredient_amount' => $value['amount'],
            ]);
        }

        $recipeData = DB::table('recipes')
            ->where(['id' => $recipeId])
            ->first();

        $recipeIngredientsDataCollection = DB::table('recipe_ingredients')
            ->where(['recipe_id' => $recipeId])
            ->get();

        $recipe = new Recipe(
            $recipeData->id,
            $recipeData->user_id,
            $recipeData->recipe_url,
            $recipeData->recipe_title,
            $recipeIngredientsDataCollection->toArray(),
            $recipeData->created_at,
            $recipeData->updated_at
        );
        return $recipe;
    }

    /**
     * @param string $userId ユーザーID
     * @param string $recipeId レシピID
     * @return Collection
     */
    public function getRecipe(string $userId, string $recipeId)
    {
        return DB::table('recipes')
            ->select(
                'id',
                'user_id',
                'recipe_url',
                'recipe_title'
            )
            ->where([
                    ['id', $recipeId],
                    ['user_id', $userId],
            ])
            ->first();
    }

    /**
     * @param string $recipeId レシピID
     * @return Collection
     */
    public function getRecipeIngredients(string $recipeId)
    {
        return DB::table('recipe_ingredients')
            ->select(
                'ingredient_category_id',
                'ingredient_name',
                'ingredient_amount'
            )
            ->where('recipe_id', $recipeId)
            ->get();
    }

    /**
     * @return Collection
     */
    public function getIngredientCategories(): Collection
    {
        $ingredientCategories = DB::table('ingredient_categories')->get();

        // ingredient_category_sortで昇順ソート
        $sortNumbers = [];
        foreach ($ingredientCategories as $ingredientCategory) {
            $sortNumbers[] = $ingredientCategory->ingredient_category_sort;
        }
        $ingredientCategoriesArray = $ingredientCategories->toArray();
        array_multisort($sortNumbers, SORT_ASC, $ingredientCategoriesArray);
        return collect($ingredientCategoriesArray);
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
     * @return array index[0]:材料　index[1]:分量
     */
    private function separateStringAndIntToArray(array $array): array
    {
        $returnArray = [];
        $explodeWords = [
            '大さじ',
            '小さじ',
            '適量',
        ];
        foreach ($array as $key => $value) {
            if (preg_match("/(" . implode('|', $explodeWords) . ")/u", $value)) {
                foreach ($explodeWords as $explodeWord) {
                    $indexOrFalse = mb_strpos($value, $explodeWord);
                    if ($indexOrFalse !== false) {
                        $temp = explode($explodeWord, $value);
                        $returnArray[$key][] = $temp[0];  // 分割前半
                        $returnArray[$key][] = mb_substr($value, $indexOrFalse); // 分割後半
                        break;
                    }
                }
            } else {
                $splitArray = preg_split("/([0-9])/", $value, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
                $returnArray[$key][] = $splitArray[0];
                unset($splitArray[0]);
                $returnArray[$key][] = implode($splitArray);
            };
        }
        return $returnArray;
    }

    /**
     * @param string $url 要素に文字列と数値を含む配列
     * @return string タグ<titile>に設定されている文字列
     */
    private function getTitleFromUrl(string $url): string|null
    {
        $title = null;
        $file = file_get_contents(
            $url,
            false,
            null,
            0,
            3000
        );
        $array = preg_split("/<\/?title>/", $file);
        if (count($array) > 0) {
            $title = $array[1];
        }
        return $title;
    }
}
