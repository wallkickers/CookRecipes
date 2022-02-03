<?php

declare(strict_types=1);

namespace Database\Factories\Api;

use App\Models\Api\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecipeFactory extends Factory
{
    /**
     * モデルと対応するファクトリの名前
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'recipe_url' => $this->faker->url(),
            'recipe_title' => $this->faker->name() . "レシピ",
        ];
    }
}
