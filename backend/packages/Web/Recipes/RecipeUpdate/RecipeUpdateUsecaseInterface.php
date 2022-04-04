<?php

declare(strict_types=1);

namespace packages\Web\Recepes\RecipeUpdate;

use packages\Web\Recepes\RecipeUpdate\RecipeUpdateRequest;
use packages\Web\Recepes\RecipeUpdate\RecipeUpdateResponse;

interface RecipeUpdateUsecaseInterface
{
    /**
     * @param RecipeUpdateRequest
     * @return RecipeUpdateResponse
     */
    public function handle(RecipeUpdateRequest $request): RecipeUpdateResponse;
}
