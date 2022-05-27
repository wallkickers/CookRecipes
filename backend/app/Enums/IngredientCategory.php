<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class IngredientCategory extends Enum
{
    const VEGETABLE = 1;
    const MEAT = 2;
    const FISH = 3;
    const SEASONING = 4;
    const MILK = 5;
    const BREAD = 6;
    const EGG = 7;
    const MUSHROOM = 8;

    public static function getIngredientCategoryName(int $id = null)
    {
        if ($id === self::VEGETABLE) {
            return '野菜';
        }

        if ($id === self::MEAT) {
            return '肉';
        }

        if ($id === self::FISH) {
            return '魚';
        }

        if ($id === self::SEASONING) {
            return '調味料';
        }

        if ($id === self::MILK) {
            return '牛乳';
        }

        if ($id === self::BREAD) {
            return 'パン';
        }

        if ($id === self::EGG) {
            return '卵';
        }

        if ($id === self::MUSHROOM) {
            return 'きのこ';
        }
    }
}
