<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing;

use App\Enums\IngredientCategory;
use DB;
use Illuminate\Support\Collection;
use packages\Domain\Recipe;
use packages\Domain\ShoppingThing;
use packages\Web\ShoppingThing\ShoppingThingRepositoryInterface;
use PhpParser\ErrorHandler\Collecting;

class ShoppingThingRepository implements ShoppingThingRepositoryInterface
{
    /**
     * @param string $userId ユーザーID
     * @return Collection
     */
    public function get(string $userId): Collection
    {
        $shoppingThing = [];
        $shoppingThingDataCollection = DB::table('shopping_things')
            ->select(
                'id',
                'user_id',
                'ingredient_category_id',
                'ingredient_name',
                'ingredient_amount'
            )
            ->where('user_id', $userId)
            ->get();

        // 指定キーを昇順ソート
        $shoppingThingDataCollection = $this->shoppingThingsSort(
            $shoppingThingDataCollection,
            'ingredient_category_id',
            SORT_ASC,
            'id',
            SORT_ASC
        );
        foreach ($shoppingThingDataCollection as $shoppingThingData) {
            $shoppingThing[] = new ShoppingThing(
                $shoppingThingData->id,
                $shoppingThingData->user_id,
                $shoppingThingData->ingredient_category_id,
                $shoppingThingData->ingredient_name,
                $shoppingThingData->ingredient_amount
            );
        }
        return collect($shoppingThing);
    }

    /**
     * @param array $recipes レシピ
     * @return Collection レシピに紐づく材料
     */
    public function getShoppingThingsIngredients(string $userId): Collection
    {
        return DB::table('shopping_things')
            ->select(
                'ingredient_category_id',
                'ingredient_name',
                'ingredient_amount'
            )
            ->where('user_id', $userId)
            ->get();
    }

    /**
     * @param string $userId ユーザーID
     * @return
     */
    public function deleteShoppingThingsIngredients(string $userId)
    {
        $a = DB::table('shopping_things')
        ->where('user_id', $userId)
        ->delete();
    }

    /**
     * @param string $userId ユーザーID
     * @param array|null $shoppingThingIngredients 買い物材料
     * @return
     */
    public function insertShoppingThingsIngredients(string $userId, array|null $shoppingThingIngredients)
    {
        if (is_array($shoppingThingIngredients) && count($shoppingThingIngredients) > 0) {
            foreach ($shoppingThingIngredients as $value) {
                DB::table('shopping_things')
                ->insert([
                    'user_id' => $userId,
                    'ingredient_category_id' => $value['category'],
                    'ingredient_name' => $value['name'],
                    'ingredient_amount' => $value['amount']
                ]);
            }
        }
    }

    /**
     * @param collection $collection ソート対象のコレクション
     * @param string $key ソートキー
     * @param int $array1SortOrder ソートフラグ
     * @param string $key2 ソートキー2
     * @param int $array2SortOrder ソートフラグ2
     * @return collection
     */
    private function shoppingThingsSort(
        collection $collection,
        string $key,
        int $array1SortOrder,
        string $key2 = null,
        int $array2SortOrder = null
    ): collection {
        $sortArray = [];
        $sortArray2 = [];
        $targetArray = $collection->all();

        if (!is_null($key2)) {
            foreach($collection as $value) {
                $sortArray[] = $value->$key;
                $sortArray2[] = $value->$key2;
            }
            array_multisort(
                $sortArray,
                $array1SortOrder,
                $sortArray2,
                $array2SortOrder,
                $targetArray
            );
        } else {
            foreach($collection as $value) {
                $sortArray[] = $value->$key;
            }
            array_multisort(
                $sortArray,
                $array1SortOrder,
                $targetArray
            );
        }
        return collect($targetArray);
    }
}
