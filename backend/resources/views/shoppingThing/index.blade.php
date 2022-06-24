@extends('layouts.login_app')

@section('content')
    <div>
        <h2 class="Page-Title">お買い物メモ</h2>
    </div>
    <div class="Form">
        <div class="Form-Item">
          <p class="Form-Item-Label isMsg">材料</p>
          @if (count($viewModel->getShoppingThingCollection()) > 0)
          <ol>
            @foreach ($viewModel->getShoppingThingCollection() as $shoppingThings)
            <li class="detailIngredientItem listId-{{ $shoppingThings->getId() }}">
                <div class="Flex">
                    <input type="checkbox" class="shoppingThingsCheck" value="{{ $shoppingThings->getId() }}">
                    @if ($shoppingThings->getIngredientCategoryId() === App\Enums\IngredientCategory::VEGETABLE)
                        <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/vegetable.png') }}" alt="vegetable"/>
                    @elseif ($shoppingThings->getIngredientCategoryId() === App\Enums\IngredientCategory::MEAT)
                        <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/meat.png') }}" alt="meat"/>
                    @elseif ($shoppingThings->getIngredientCategoryId() === App\Enums\IngredientCategory::FISH)
                        <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/fish.png') }}" alt="fish"/>
                        @elseif ($shoppingThings->getIngredientCategoryId() === App\Enums\IngredientCategory::SEASONING)
                        <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/seasoning.png') }}" alt="seasoning"/>
                    @elseif ($shoppingThings->getIngredientCategoryId() === App\Enums\IngredientCategory::MILK)
                        <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/milk.png') }}" alt="milk"/>
                    @elseif ($shoppingThings->getIngredientCategoryId() === App\Enums\IngredientCategory::BREAD)
                        <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/bread.png') }}" alt="bread"/>
                    @elseif ($shoppingThings->getIngredientCategoryId() === App\Enums\IngredientCategory::EGG)
                        <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/egg.png') }}" alt="egg"/>
                    @elseif ($shoppingThings->getIngredientCategoryId() === App\Enums\IngredientCategory::MUSHROOM)
                        <img class="detailIngredientItemImage" src="{{ asset('images/ingredientCategory/mushroom.png') }}" alt="mushroom"/>
                    @endif
                    <p class="detailIngredientItemText Form-Item-Text">{{ $shoppingThings->getIngredientName() }} {{ $shoppingThings->getIngredientAmount() }}</p>
                </div>
            </li>
            @endforeach
          </ol>
          @else
          <p class="Form-Item-Text">未入力</p>
          @endif
        </div>
        <div class="Form-Btn-Group">
            <a href="{{ route("shopping_things.recipe_select") }}" class="Form-Btn">作成</a>
            <a href="{{ route("shopping_things.edit")}}" class="Form-Btn Tomato">修正</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('/js/shopping_things.js') }}"></script>
@endsection
