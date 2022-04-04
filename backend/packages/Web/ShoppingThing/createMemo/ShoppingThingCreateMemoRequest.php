<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\createMemo;

use Illuminate\Http\Request;

class ShoppingThingCreateMemoRequest extends Request
{
    /**
     * @var string
     * @var array
     */
    private $userId;
    private $recipes;

    public function __construct(
        string $userId,
        array $recipes
    ){
        $this->userId = $userId;
        $this->recipes = $recipes;
    }

    /**
     * @return string
     */
    public function getUserId(): string
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
