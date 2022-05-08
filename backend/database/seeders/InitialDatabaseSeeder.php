<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\IngredientCategory;
use App\Models\ShoppingThing;
use App\Models\Recipe;
use App\Models\User;
use DB;
use Illuminate\Database\Seeder;

class InitialDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $user = User::factory()->create();

            for ($i=0; $i<10; ++$i) {
                $recipe = Recipe::factory()->create(
                    [
                        'user_id' => $user->id,
                    ]
                );
            }

            // 材料カテゴリーのマスターデータ作成
            $ingredientCategories = [];
            for ($i=1; $i<=8; ++$i) {
                $ingredientCategories[] = [
                    'ingredient_category_name' => IngredientCategory::getIngredientCategoryName($i),
                    'ingredient_category_sort' => (string)$i,
                ];
            }
            DB::table('ingredient_categories')
                ->insert($ingredientCategories);
        });
    }
}
