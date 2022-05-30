<?php

declare(strict_types=1);

namespace packages\Web\ShoppingThing\index;

use Illuminate\Http\Request;

class ShoppingThingRequest extends Request
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
