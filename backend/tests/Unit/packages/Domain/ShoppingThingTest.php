<?php

declare(strict_types=1);

namespace Tests\Unit;

use packages\Domain\ShoppingThing;
use PHPUnit\Framework\TestCase;

class ShoppingThingTest extends TestCase
{
    private ShoppingThing $target;
    private int $id;
    private int $userId;
    private int|null $ingredientCategoryId;
    private string $ingredientName;
    private string|null $ingredientAmount;

    public function setUp(): void
    {
        parent::setup();
        $this->id = 1;
        $this->userId = 1;
        $this->ingredientCategoryId = 1;
        $this->ingredientName = "材料名";
        $this->ingredientAmount = "1g";
        $this->target = new ShoppingThing(
            $this->id,
            $this->userId,
            $this->ingredientCategoryId,
            $this->ingredientName,
            $this->ingredientAmount
        );
    }

    /**
     * @test
     */
    public function getId(): void
    {
        $this->assertSame($this->id, $this->target->{__FUNCTION__}());
    }

    /**
     * @test
     */
    public function getUserId(): void
    {
        $this->assertSame($this->userId, $this->target->{__FUNCTION__}());
    }

    /**
     * @test
     */
    public function getIngredientCategoryId(): void
    {
        $this->assertSame($this->ingredientCategoryId, $this->target->{__FUNCTION__}());
    }

    /**
     * @test
     */
    public function getIngredientName(): void
    {
        $this->assertSame($this->ingredientName, $this->target->{__FUNCTION__}());
    }

    /**
     * @test
     */
    public function getIngredientAmount(): void
    {
        $this->assertSame($this->ingredientAmount, $this->target->{__FUNCTION__}());
    }
}
