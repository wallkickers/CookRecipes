<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoRequest;
use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoUsecaseInterface;
use packages\Web\ShoppingThing\createMemo\ShoppingThingCreateMemoViewModel;
use packages\Web\ShoppingThing\edit\ShoppingThingEditRequest;
use packages\Web\ShoppingThing\edit\ShoppingThingEditUsecaseInterface;
use packages\Web\ShoppingThing\edit\ShoppingThingEditViewModel;
use packages\Web\ShoppingThing\index\ShoppingThingRequest;
use packages\Web\ShoppingThing\index\ShoppingThingUsecaseInterface;
use packages\Web\ShoppingThing\index\ShoppingThingViewModel;
use packages\Web\ShoppingThing\insert\ShoppingThingInsertRequest;
use packages\Web\ShoppingThing\insert\ShoppingThingInsertUsecaseInterface;
use packages\Web\ShoppingThing\recipeSelect\ShoppingThingRecipeSelectRequest;
use packages\Web\ShoppingThing\recipeSelect\ShoppingThingRecipeSelectUsecaseInterface;
use packages\Web\ShoppingThing\recipeSelect\ShoppingThingRecipeSelectViewModel;

class ShoppingThingController extends Controller
{
    public function index(Request $request, ShoppingThingUsecaseInterface $shoppingThingInteractor)
    {
        $userId = Auth::user()->id;
        $shoppingThingRequest = new ShoppingThingRequest($userId);
        $shoppingThingResponse = $shoppingThingInteractor->handle($shoppingThingRequest);
        $viewModel = new ShoppingThingViewModel(
            $shoppingThingResponse->getShoppingThingCollection(),
            $shoppingThingResponse->getIngredientCategories()
        );
        return view('shoppingThing.index', compact(['viewModel']));
    }

    // レシピ選択画面
    public function recipeSelect(Request $request, ShoppingThingRecipeSelectUsecaseInterface $shoppingThingRecipeSelectInteractor)
    {
        $userId = Auth::user()->id;
        $shoppingThingRecipeSelectRequest = new ShoppingThingRecipeSelectRequest($userId);
        $shoppingThingResponse = $shoppingThingRecipeSelectInteractor->handle($shoppingThingRecipeSelectRequest);
        $viewModel = new ShoppingThingRecipeSelectViewModel($shoppingThingResponse->getRecipeCollection());
        return view('shoppingThing.recipe_select', compact('viewModel'));
    }

    // メモ作成
    public function createMemo(Request $request, ShoppingThingCreateMemoUsecaseInterface $shoppingThingCreateMemoInteractor)
    {
        $userId = Auth::user()->id;
        $selectedRecipes = $request->selected_recipes ?? [];
        $shoppingThingCreateMemoRequest = new ShoppingThingCreateMemoRequest(
            $userId,
            $selectedRecipes
        );
        $shoppingThingCreateMemoResponse = $shoppingThingCreateMemoInteractor->handle($shoppingThingCreateMemoRequest);
        $viewModel = new ShoppingThingCreateMemoViewModel(
            $shoppingThingCreateMemoResponse->getIngredientsCollection(),
            $shoppingThingCreateMemoResponse->getIngredientCategories()
        );
        return view('shoppingThing.create_memo', compact(['viewModel']));
    }

    public function insert(Request $request, ShoppingThingInsertUsecaseInterface $shoppingThingInsertInteractor)
    {
        $userId = Auth::user()->id;
        $ingredients = [];
        $ingredientCategory = $request->ingredient_category ?? [];

        for ($i=0; $i<count($ingredientCategory); ++$i) {
            $ingredients[] = [
                'category' => $ingredientCategory[$i],
                'name' => $request->ingredient_name[$i],
                'amount' => $request->ingredient_amount[$i],
            ];
        }

        $shoppingThingInsertRequest = new ShoppingThingInsertRequest(
            $userId,
            $ingredients
        );
        $shoppingThingInsertInteractor->handle($shoppingThingInsertRequest);
        return redirect()->route('shopping_things.index');
    }

    public function edit(Request $request, ShoppingThingEditUsecaseInterface $shoppingThingEditInteractor)
    {
        $userId = Auth::user()->id;
        $shoppingThingEditRequest = new ShoppingThingEditRequest($userId);
        $shoppingThingEditResponse = $shoppingThingEditInteractor->handle($shoppingThingEditRequest);
        $viewModel = new ShoppingThingEditViewModel(
            $shoppingThingEditResponse->getIngredientsCollection(),
            $shoppingThingEditResponse->getIngredientCategories()
        );
        return view('shoppingThing.edit', compact(['viewModel']));
    }
}
