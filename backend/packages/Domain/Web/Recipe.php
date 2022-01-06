<?php

declare(strict_types=1);

namespace packages\Domain\Web;

class Recipe
{
    private string $recipeUrl;
    private string $recipeTitle;

    public function __construct(
        string $recipeUrl,
        string $recipeTitle,
    ) {
        $this->recipeUrl = $recipeUrl;
        $this->recipeTitle = $recipeTitle;
    }

    /**
     * @return string
     */
    public function getrecipeUrl(): string
    {
        return $this->recipeUrl;
    }

    /**
     * @return string
     */
    public function getrecipeTitle(): string
    {
        return $this->recipeTitle;
    }
}
