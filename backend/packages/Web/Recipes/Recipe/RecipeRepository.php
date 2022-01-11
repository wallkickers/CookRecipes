<?php

declare(strict_types=1);

namespace packages\Web\Recepes\Recipe;

use App\Http\Trait\ApiBaseTrait;
use Illuminate\Support\Collection;
use packages\Domain\Web\Recipe;
use packages\Web\Recepes\Recipe\RecipeRepositoryInterface;

class RecipeRepository implements RecipeRepositoryInterface
{
    use ApiBaseTrait;

    /**
     * @param string $userId ユーザーID
     * @return Collection
     */
    public function find(string $userId): Collection
    {
        $recipeDataCollection = $this->get('/api/recipes');
        $recipe = [];
        foreach ($recipeDataCollection->original as $recipeData) {
            $recipe[] = new Recipe(
                $recipeData->getrecipeUrl(),
                $recipeData->getrecipeTitle()
            );
        }
        return collect($recipe);
    }

    /**
     * @param string $userId ユーザーID
     * @return Collection
     */
    public function insertOrUpdate(
        string $userId,
        string $recipeUrl,
        string|null $recipeIngredient
    ): Collection {
        $params = [];
        $params['userId'] = $userId;
        $params['recipeUrl'] = $recipeUrl;
        $params['recipeIngredient'] = $recipeIngredient;
        $result = $this->post(
            '/api/recipe/createUpdate',
            $params
        );
        dd($result);
    }
}
