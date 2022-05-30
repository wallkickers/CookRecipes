<?php

declare(strict_types=1);

namespace packages\Web\Recepes\Recipe;

use Illuminate\Http\Request;

class RecipeRequest extends Request
{
    /**
     * @var int
     */
    private $userId;

    public function __construct(
        int $userId
    ){
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }
}
