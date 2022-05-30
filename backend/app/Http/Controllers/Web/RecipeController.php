<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use packages\Web\Recepes\Recipe\RecipeRequest;
use packages\Web\Recepes\Recipe\RecipeUsecaseInterface;
use packages\Web\Recepes\Recipe\RecipeViewModel;
use packages\Web\Recepes\RecipeCreate\RecipeCreateRequest;
use packages\Web\Recepes\RecipeCreate\RecipeCreateUsecaseInterface;
use packages\Web\Recepes\RecipeDetail\RecipeDetailRequest;
use packages\Web\Recepes\RecipeDetail\RecipeDetailUsecaseInterface;
use packages\Web\Recepes\RecipeDetail\RecipeDetailViewModel;
use packages\Web\Recepes\RecipeEdit\RecipeEditRequest;
use packages\Web\Recepes\RecipeEdit\RecipeEditUsecaseInterface;
use packages\Web\Recepes\RecipeEdit\RecipeEditViewModel;
use packages\Web\Recepes\RecipeUpdate\RecipeUpdateRequest;
use packages\Web\Recepes\RecipeUpdate\RecipeUpdateUsecaseInterface;
use packages\Web\Recepes\RecipeUpdate\RecipeUpdateViewModel;

class RecipeController extends Controller
{
    public function index(Request $request, RecipeUsecaseInterface $recipeInteractor)
    {
        $userId = Auth::user()->id;

        $recipeRequest = new RecipeRequest($userId);
        $recipeResponse = $recipeInteractor->handle($recipeRequest);
        $viewModel = new RecipeViewModel($recipeResponse->getRecipeCollection());
        return view('recipes', compact(['viewModel']));
    }

    public function create()
    {
        return view('recipe_create');
    }

    public function edit(Request $request, RecipeEditUsecaseInterface $recipeEditInteractor)
    {
        $userId = Auth::user()->id;

        // TODO: ログイン中のユーザーが見れるレシピかどうか判定はどこでする？

        $recipeId = $request->recipeId;
        $recipeEditRequest = new recipeEditRequest($userId, $recipeId);
        $recipeEditResponse = $recipeEditInteractor->handle($recipeEditRequest);
        $viewModel = new RecipeEditViewModel(
            $recipeEditResponse->getRecipeData(),
            $recipeEditResponse->getIngredientCategories()
        );
        return view('recipe_edit', compact(['viewModel']));
    }

    public function insert(Request $request, RecipeCreateUsecaseInterface $recipeCreateInteractor)
    {
        $userId = Auth::user()->id;

        $recipeTitle = $request->recipe_title;
        $recipeUrl = $request->recipe_url;
        $recipeIngredient = $request->recipe_ingredients;

        $recipeCreateRequest = new RecipeCreateRequest(
            $userId,
            $recipeTitle,
            $recipeUrl,
            $recipeIngredient
        );
        $recipeResponse = $recipeCreateInteractor->handle($recipeCreateRequest);
        $viewModel = new RecipeDetailViewModel($recipeResponse->getRecipe());
        return view('recipe_detail', compact(['viewModel']));
    }

    public function update(Request $request, RecipeUpdateUsecaseInterface $recipeUpdateInteractor)
    {
        $userId = Auth::user()->id;
        $recipeId = $request->recipe_id;
        $recipeIngredients = [];
        $ingredientCategory = $request->ingredient_category ?? [];

        for ($i=0; $i<count($ingredientCategory); ++$i) {
            $recipeIngredients[] = [
                'category' => $ingredientCategory[$i],
                'name' => $request->ingredient_name[$i],
                'amount' => $request->ingredient_amount[$i],
            ];
        }

        $recipeUpdateRequest = new recipeUpdateRequest(
            $recipeId,
            $userId,
            $request->recipe_title,
            $request->recipe_url,
            $recipeIngredients
        );
        $recipeResponse = $recipeUpdateInteractor->handle($recipeUpdateRequest);
        return redirect()->route('recipe_detail', $recipeId);
    }

    public function detail(Request $request, RecipeDetailUsecaseInterface $recipeDetailInteractor)
    {
        $userId = Auth::user()->id;

        // TODO: ログイン中のユーザーが見れるレシピかどうか判定はどこでする？

        $recipeId = $request->recipeId;
        $recipeDetailRequest = new recipeDetailRequest($userId, $recipeId);
        $recipeDetailResponse = $recipeDetailInteractor->handle($recipeDetailRequest);
        $viewModel = new RecipeDetailViewModel($recipeDetailResponse->getRecipeData());
        return view('recipe_detail', compact(['viewModel']));
    }
}
