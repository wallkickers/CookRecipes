<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use packages\Api\Recepes\Recipe\RecipeRequest;
use packages\Api\Recepes\Recipe\RecipeUsecaseInterface;
use packages\Api\Recepes\RecipeCreate\RecipeCreateRequest;
use packages\Api\Recepes\RecipeCreate\RecipeCreateUsecaseInterface;

class RecipeController extends Controller
{
    /**
     * @param Request $request
     * @param RecipeUsecaseInterface $recipeInteractor
     * @return JsonResponse
     */
    public function index(Request $request, RecipeUsecaseInterface $recipeInteractor): JsonResponse
    {
        // TODO: 削除。リクエスト内からユーザーIDを取得するよう修正。
        $userId = '1';

        $recipeRequest = new RecipeRequest($userId);
        $recipeResponse = $recipeInteractor->handle($recipeRequest);

        return response()->json($recipeResponse->getRecipeCollection());
    }

    /**
     * @param Request $request
     * @param RecipeCreateUsecaseInterface $recipeCreateInteractor
     * @return JsonResponse
     */
    public function createUpdate(Request $request, RecipeCreateUsecaseInterface $recipeCreateInteractor): JsonResponse
    {
        // TODO: 削除。リクエスト内からパラメータを取得するよう修正。
        $userId = '1';

        $recipeUrl = $request->recipe_url;
        $recipeIngredient = $request->recipe_ingredients;

        $recipeCreateRequest = new RecipeCreateRequest(
            $userId,
            $recipeUrl,
            $recipeIngredient
        );
        $recipeResponse = $recipeCreateInteractor->handle($recipeCreateRequest);
        return response()->json($recipeResponse->getRecipeCreateCollection());
    }
}
