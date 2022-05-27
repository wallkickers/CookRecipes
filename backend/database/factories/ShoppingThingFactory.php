<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ShoppingThing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShoppingThingFactory extends Factory
{
    /**
     * モデルと対応するファクトリの名前
     *
     * @var string
     */
    protected $model = ShoppingThing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'ingredient_category_id' => 1,
            'ingredient_name' => '肉',
            'ingredient_amount' => '200g',
        ];
    }
}
