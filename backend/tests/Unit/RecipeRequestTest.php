<?php

declare(strict_types=1);

namespace Tests\Unit;

use packages\Web\Recepes\Recipe\RecipeRequest;
use PHPUnit\Framework\TestCase;

class RecipeRequestTest extends TestCase
{
    /**
     * @test
     */
    public function getUserId(): void
    {
        $userId = '1';
        $target = new RecipeRequest($userId);
        $this->assertSame($userId, $target->{__FUNCTION__}());
    }
}
