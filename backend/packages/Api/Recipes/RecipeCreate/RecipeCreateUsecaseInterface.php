<?php

declare(strict_types=1);

namespace packages\Api\Recepes\RecipeCreate;

use packages\Api\Recepes\RecipeCreate\RecipeCreateRequest;
use packages\Api\Recepes\RecipeCreate\RecipeCreateResponse;

interface RecipeCreateUsecaseInterface
{
    /**
     * @param RecipeCreateRequest
     * @return RecipeCreateResponse
     */
    public function handle(RecipeCreateRequest $request): RecipeCreateResponse;
}
