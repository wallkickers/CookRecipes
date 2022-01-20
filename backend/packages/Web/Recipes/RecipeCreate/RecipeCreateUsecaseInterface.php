<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeCreate;

use packages\Web\Recepes\RecipeCreate\RecipeCreateRequest;
use packages\Web\Recepes\RecipeCreate\RecipeCreateResponse;

interface RecipeCreateUsecaseInterface
{
    /**
     * @param RecipeCreateRequest
     * @return RecipeCreateResponse
     */
    public function handle(RecipeCreateRequest $request): RecipeCreateResponse;
}
