<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeEdit;

use packages\Web\Recepes\RecipeEdit\RecipeEditRequest;
use packages\Web\Recepes\RecipeEdit\RecipeEditResponse;

interface RecipeEditUsecaseInterface
{
    /**
     * @param RecipeEditRequest
     * @return RecipeEditResponse
     */
    public function handle(RecipeEditRequest $request): RecipeEditResponse;
}
