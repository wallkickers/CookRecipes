<?php

declare(strict_types=1);

namespace packages\Api\Recepes\RecipeDetail;

use packages\Api\Recepes\RecipeDetail\RecipeDetailRequest;
use packages\Api\Recepes\RecipeDetail\RecipeDetailResponse;

interface RecipeDetailUsecaseInterface
{
    /**
     * @param RecipeDetailRequest
     * @return RecipeDetailResponse
     */
    public function handle(RecipeDetailRequest $request): RecipeDetailResponse;
}
