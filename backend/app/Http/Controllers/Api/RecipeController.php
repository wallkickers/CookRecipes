<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use packages\Api\Recepes\Recipe\RecipeInteractor;
use packages\Api\Recepes\Recipe\RecipeRequest;
use packages\Api\Recepes\Recipe\RecipeUsecaseInterface;
use packages\Api\Recepes\Recipe\RecipeViewModel;

class RecipeController extends Controller
{
    /**
     * @param Request $request
     * @param RecipeUsecaseInterface $recipeInteractor
     * @return RecipeViewModel
     */
    public function index(Request $request, RecipeInteractor $recipeInteractor)
    {
        // TODO: 開発用。リクエスト内からユーザーIDを取得するよう修正。
        $userId = '1';

        $recipeRequest = new RecipeRequest($userId);
        $recipeResponse = $recipeInteractor->handle($recipeRequest);
        return response()->json($recipeResponse->getRecipeCollection());
    }
}
