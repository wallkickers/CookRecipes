<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ShoppingThingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingThing extends Model
{
    use HasFactory;

    const CREATED_AT = null;
    const UPDATED_AT = null;

    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ShoppingThingFactory::new();
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'ingredient_category_id',
        'ingredient_name',
        'ingredient_amount',
    ];

    /**
     * @var array
     */
    protected $hidden = [
    ];
}
