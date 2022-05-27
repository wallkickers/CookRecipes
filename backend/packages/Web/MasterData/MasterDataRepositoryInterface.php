<?php

declare(strict_types=1);

namespace packages\Web\MasterData;

interface MasterDataRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getIngredientCategories();
}
