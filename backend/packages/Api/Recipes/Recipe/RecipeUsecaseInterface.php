<?php

declare(strict_types=1);

namespace packages\Api\Recepes\Recipe;

use packages\Api\Recepes\Recipe\RecipeRequest;
use packages\Api\Recepes\Recipe\RecipeResponse;

interface RecipeUsecaseInterface
{
    /**
     * @param RecipeRequest
     * @return RecipeResponse
     */
    public function handle(RecipeRequest $request): RecipeResponse;
}
