@extends('layouts.login_app')

@section('content')
<form id="contact" action="{{ route('shopping_things.create_memo') }}" method="POST">
    @csrf
    <div>
        <h2 class="Page-Title">レシピ選択</h2>
    </div>
    <div class="Form">
        <div class="Form-Item-Non-Flex">
            <p class="Form-Item-Label">作り置きで作りたいレシピを選択してください。</p>
            <ol id="Ingredient-List">
                @foreach ($viewModel->getRecipeCollection() as $key => $recipe)
                <li id="selected_recipes_{{$recipe->getId()}}" class="recipeItem">
                    <input
                        type="checkbox"
                        name="selected_recipes[]"
                        class="Recipe-Select-Input"
                        value="{{ $recipe->getId() }}"
                    >
                    <span>{{ $recipe->getrecipeTitle() }}</span>
                </li>
                @endforeach
            </ol>
        </div>
        {{-- <input name="recipe_id" value="{{ $viewModel->getRecipeData()->getId() }}" type="hidden"> --}}
        <div class="Form-Btn-Group">
            <input type="submit" class="Form-Btn" value="メモ作成">
        </div>
    </div>
</form>
@endsection
