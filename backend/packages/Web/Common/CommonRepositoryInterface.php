<?php

declare(strict_types=1);

namespace packages\Web\Common;

interface CommonRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getIngredientCategories();
}
