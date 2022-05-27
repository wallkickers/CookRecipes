<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\recipeSelect;

use Illuminate\Http\Request;

class ShoppingThingRecipeSelectRequest extends Request
{
    /**
     * @var string
     */
    private $userId;

    public function __construct(
        string $userId
    ){
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }
}
