@extends('layouts.login_app')

@section('content')
    <div>
        <h2 class="Page-Title">レシピ詳細</h2>
    </div>
    <div class="Form">
        <div class="Form-Item">
            <p class="Form-Item-Label">レシピタイトル</p>
            @if(!is_null($viewModel->getRecipeData()->getrecipeTitle()))
            <p class="Form-Item-Text">{{ $viewModel->getRecipeData()->getrecipeTitle() }}</p>
            @else
            <p class="Form-Item-Text">未入力</p>
            @endif
          </div>
        <div class="Form-Item">
          <p class="Form-Item-Label">レシピURL</p>
          <a href="{{ $viewModel->getRecipeData()->getrecipeUrl() }}"
            target="_blank" rel="noopener noreferrer" class="recipeUrl"
            >
            {{ $viewModel->getRecipeData()->getrecipeUrl() }}
            </a>
        </div>
        <div class="Form-Item">
          <p class="Form-Item-Label isMsg">材料</p>
          @if (count($viewModel->getRecipeData()->getRecipeIngredients()) > 0)
          <ol>
            @foreach ($viewModel->getRecipeData()->getRecipeIngredients() as $recipeIngredients)
            <li class="detailIngredientItem">
                <div class="Flex">
                @if ($recipeIngredients->ingredient_category_id === App\Enums\IngredientCategory::VEGETABLE)
                    <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/vegetable.png') }}" alt="vegetable"/>
                @elseif ($recipeIngredients->ingredient_category_id === App\Enums\IngredientCategory::MEAT)
                    <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/meat.png') }}" alt="meat"/>
                @elseif ($recipeIngredients->ingredient_category_id === App\Enums\IngredientCategory::FISH)
                    <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/fish.png') }}" alt="fish"/>
                    @elseif ($recipeIngredients->ingredient_category_id === App\Enums\IngredientCategory::SEASONING)
                    <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/seasoning.png') }}" alt="seasoning"/>
                @elseif ($recipeIngredients->ingredient_category_id === App\Enums\IngredientCategory::MILK)
                    <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/milk.png') }}" alt="milk"/>
                @elseif ($recipeIngredients->ingredient_category_id === App\Enums\IngredientCategory::BREAD)
                    <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/bread.png') }}" alt="bread"/>
                @elseif ($recipeIngredients->ingredient_category_id === App\Enums\IngredientCategory::EGG)
                    <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/egg.png') }}" alt="egg"/>
                @elseif ($recipeIngredients->ingredient_category_id === App\Enums\IngredientCategory::MUSHROOM)
                    <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/mushroom.png') }}" alt="mushroom"/>
                @endif
                <p class="detailIngredientItemText Form-Item-Text">{{ $recipeIngredients->ingredient_name }} {{ $recipeIngredients->ingredient_amount }}</p>
                </div>
            </li>
            @endforeach
          </ol>
          @else
          <p class="Form-Item-Text">未入力</p>
          @endif
        </div>
        <div class="Form-Btn-Group">
            <a href="{{ route("recipe_edit", $viewModel->getRecipeData()->getId()) }}" class="Form-Btn Tomato">修正する</a>
            <a href="{{ route("recipes")}}" class="Form-Btn Gray">一覧へ戻る</a>
        </div>
    </div>
@endsection
