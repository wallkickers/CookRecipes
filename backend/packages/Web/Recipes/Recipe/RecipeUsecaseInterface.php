<?php

declare(strict_types=1);

namespace packages\Web\Recepes\Recipe;

use packages\Web\Recepes\Recipe\RecipeRequest;
use packages\Web\Recepes\Recipe\RecipeResponse;

interface RecipeUsecaseInterface
{
    /**
     * @param RecipeRequest
     * @return RecipeResponse
     */
    public function handle(RecipeRequest $request): RecipeResponse;
}
