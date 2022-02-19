@extends('layouts.app')

@section('content')
    <div>
        <h2 class="Page-Title">レシピ詳細</h2>
    </div>
    <div class="Form">
        <div class="Form-Item">
            <p class="Form-Item-Label">レシピタイトル</p>
            @if(!is_null($viewModel->getRecipeData()->getrecipeTitle()))
            <p>{{ $viewModel->getRecipeData()->getrecipeTitle() }}</p>
            @else
            <p>未入力</p>
            @endif
          </div>
        <div class="Form-Item">
          <p class="Form-Item-Label">レシピURL</p>
          <a href="{{ $viewModel->getRecipeData()->getrecipeUrl() }}"
            target="_blank" rel="noopener noreferrer"
            >
            {{ $viewModel->getRecipeData()->getrecipeUrl() }}
            </a>
        </div>
        <div class="Form-Item">
          <p class="Form-Item-Label isMsg">材料</p>
          <ol>
            @foreach ($viewModel->getRecipeData()->getRecipeIngredients() as $recipeIngredients)
            <li>
                <p>{{ $recipeIngredients->ingredient_category_id }} {{ $recipeIngredients->ingredient_name }} {{ $recipeIngredients->ingredient_amount }}</p>
            </li>
            @endforeach
          </ol>
        </div>
        <div class="Form-Btn-Group">
            <a href="{{ route("recipe_edit", $viewModel->getRecipeData()->getId()) }}" class="Form-Btn">修正する</a>
            <a href="{{ route("recipe_delete", $viewModel->getRecipeData()->getId()) }}" class="Form-Btn Red">削除</a>
        </div>
    </div>
@endsection
