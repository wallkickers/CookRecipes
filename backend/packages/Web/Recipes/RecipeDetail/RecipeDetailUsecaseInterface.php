<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeDetail;

use packages\Web\Recepes\RecipeDetail\RecipeDetailRequest;
use packages\Web\Recepes\RecipeDetail\RecipeDetailResponse;

interface RecipeDetailUsecaseInterface
{
    /**
     * @param RecipeDetailRequest
     * @return RecipeDetailResponse
     */
    public function handle(RecipeDetailRequest $request): RecipeDetailResponse;
}
