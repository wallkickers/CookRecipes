<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\insert;

use Illuminate\Http\Request;

class ShoppingThingInsertRequest extends Request
{
    /**
     * @var string
     * @var array|null $ingredients 材料
     */
    private $userId;
    private $ingredients;

    public function __construct(
        string $userId,
        array $ingredients
    ){
        $this->userId = $userId;
        $this->ingredients = $ingredients;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @return array|null
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }
}
