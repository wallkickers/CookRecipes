<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\createMemo;

use Illuminate\Http\Request;

class ShoppingThingCreateMemoRequest extends Request
{
    /**
     * @var int
     * @var array
     */
    private $userId;
    private $recipes;

    public function __construct(
        int $userId,
        array $recipes
    ){
        $this->userId = $userId;
        $this->recipes = $recipes;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    public function getRecipes(): array
    {
        return $this->recipes;
    }
}
