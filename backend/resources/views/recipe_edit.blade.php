@extends('layouts.app')

<script>
    const ingredientCategoriesObject = @json($viewModel->getIngredientCategories());
</script>

@section('content')
<form id="contact" action="{{ route('recipe_update') }}" method="POST">
    @csrf
    <div>
        <h2 class="Page-Title">レシピ修正</h2>
    </div>
    <div class="Form">
        <div class="Form-Item">
            <p class="Form-Item-Label">レシピタイトル</p>
            <input type="text" class="Form-Item-Input" name="recipe_title" placeholder="例）ささみほうれん草" value="{{ $viewModel->getRecipeData()->getrecipeTitle() }}">
          </div>
        <div class="Form-Item">
          <p class="Form-Item-Label">レシピURL</p>
          <input type="text" class="Form-Item-Input" name="recipe_url" placeholder="例）https://cookrecipe.com/aaaaa" value="{{ $viewModel->getRecipeData()->getrecipeUrl() }}" required>
        </div>
        <div class="Form-Item">
            <p class="Form-Item-Label">材料</p>
            <ol id="Ingredient-List">
                @foreach ($viewModel->getRecipeData()->getRecipeIngredients() as $key => $recipeIngredients)
                <li id="ingredientItem_{{$key}}" class="ingredientItem">
                    <select name="ingredient_category[]" class="editIngredientCategory">
                        <option value=''>カテゴリー</option>
                        @foreach($viewModel->getIngredientCategories() as $ingredientCategory)
                        <option  value="{{ $ingredientCategory->id }}"
                            @if($ingredientCategory->id === $recipeIngredients->ingredient_category_id) selected @endif
                        >
                        {{ $ingredientCategory->ingredient_category_name }}
                        </option>
                        @endforeach
                    </select>
                    <span>
                        <input name="ingredient_name[]" value="{{ $recipeIngredients->ingredient_name }}" placeholder="材料名" class="editIngredientName" required>
                        <input name="ingredient_amount[]" value="{{ $recipeIngredients->ingredient_amount }}" placeholder="量" class="editIngredientAmount">
                    </span>
                    <button type="button" class="Input-Minus" data-index="{{$key}}">-</button>
                </li>
                @endforeach
            </ol>
            <button type="button" class="Form-Btn Btn-Small Tomato Input-Plus">+</button>
        </div>
        <input name="recipe_id" value="{{ $viewModel->getRecipeData()->getId() }}" type="hidden">
        <div class="Form-Btn-Group">
            <input type="submit" class="Form-Btn" value="保存する">
        </div>
    </div>
</form>
@endsection

@section('scripts')
    <script src="{{ asset('/js/form.js') }}"></script>
@endsection
