<?php

declare(strict_types=1);

namespace packages\Web\Common;

use DB;
use Illuminate\Support\Collection;
use packages\Web\Common\CommonRepositoryInterface;

class CommonRepository implements CommonRepositoryInterface
{
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
}
