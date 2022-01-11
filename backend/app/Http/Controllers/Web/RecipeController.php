<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use packages\Web\Recepes\Recipe\RecipeRequest;
use packages\Web\Recepes\Recipe\RecipeUsecaseInterface;
use packages\Web\Recepes\Recipe\RecipeViewModel;
use packages\Web\Recepes\RecipeCreate\RecipeCreateRequest;
use packages\Web\Recepes\RecipeCreate\RecipeCreateUsecaseInterface;
use packages\Web\Recepes\RecipeCreate\RecipeCreateViewModel;

class RecipeController extends Controller
{
    public function index(Request $request, RecipeUsecaseInterface $recipeInteractor)
    {
        // TODO: ログイン中のユーザーからIDを取得する
        $userId = '1';

        $recipeRequest = new RecipeRequest($userId);
        $recipeResponse = $recipeInteractor->handle($recipeRequest);
        $viewModel = new RecipeViewModel($recipeResponse->getRecipeCollection());
        return view('recipes', compact(['viewModel']));
    }

    public function create()
    {
        return view('recipe_create');
    }

    public function update(Request $request, RecipeCreateUsecaseInterface $recipeCreateInteractor)
    {
        // TODO: ログイン中のユーザーからIDを取得する
        $userId = '1';
        $recipeUrl = "";
        $recipeIngredient = "adfsdfsdfasdfads";

        $recipeCreateRequest = new RecipeCreateRequest(
            $userId,
            $recipeUrl,
            $recipeIngredient
        );
        $recipeResponse = $recipeCreateInteractor->handle($recipeCreateRequest);
        // $viewModel = new RecipeViewModel($recipeResponse->getRecipeCollection());
        // return view('recipes', compact(['viewModel']));
    }
}
