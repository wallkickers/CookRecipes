@extends('layouts.login_app')

<script>
    const ingredientCategoriesObject = @json($viewModel->getIngredientCategories());
</script>

@section('content')
<form id="contact" action="{{ route('shopping_things.insert') }}" method="POST">
    @csrf
    <div>
        <h2 class="Page-Title">お買い物メモ作成</h2>
    </div>
    <div class="Form">
        <div class="Form-Item">
            <p class="Form-Item-Label">材料</p>
            <ol id="Ingredient-List">
                @foreach ($viewModel->getIngredientsCollection() as $key => $ingredient)
                <li id="ingredientItem_{{$key}}" class="ingredientItem">
                    <select name="ingredient_category[]" class="editIngredient editIngredientCategory">
                        <option value=''>カテゴリー</option>
                        @foreach($viewModel->getIngredientCategories() as $ingredientCategory)
                        <option  value="{{ $ingredientCategory->id }}"
                            @if($ingredientCategory->id === $ingredient->ingredient_category_id) selected @endif
                        >
                        {{ $ingredientCategory->ingredient_category_name }}
                        </option>
                        @endforeach
                    </select>
                    <span>
                        <input name="ingredient_name[]" value="{{ $ingredient->ingredient_name }}" placeholder="材料名" class="editIngredient editIngredientName" required>
                        <input name="ingredient_amount[]" value="{{ $ingredient->ingredient_amount }}" placeholder="量" class="editIngredient editIngredientAmount">
                    </span>
                    <button type="button" class="Input-Minus" data-index="{{$key}}">✖︎</button>
                </li>
                @endforeach
            </ol>
            <button type="button" class="Form-Btn Btn-Small Input-Plus">+</button>
        </div>
        <div class="Form-Btn-Group">
            <input type="submit" class="Form-Btn" value="作成する">
        </div>
    </div>
</form>
@endsection

@section('scripts')
    <script src="{{ asset('/js/form.js') }}"></script>
@endsection
