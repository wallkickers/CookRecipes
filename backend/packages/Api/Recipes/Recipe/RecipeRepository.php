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
                $recipeData->recipe_url
            );
        }
        return collect($recipe);
    }


}
