<?php

declare(strict_types=1);

namespace packages\Web\Auth;

use Illuminate\Support\Collection;

class AuthViewModel
{
    private Collection $recipeCollection;

    public function __construct(
        Collection $recipeCollection
    ){
        $this->recipeCollection = $recipeCollection;
    }

    /**
     * @return Collection
     */
    public function getAuthCollection(): Collection
    {
        return $this->recipeCollection;
    }
}
