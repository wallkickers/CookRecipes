<article class="grid">
    <a href='{{ route('recipe_detail', $recipe->getId() ) }}'>
        <p class="img"><img src="{{ 'images/eyecatch2.jpg' }}" width="220" height="160" alt=""></p>
        @if (!is_null($recipe->getrecipeTitle()))
        <h3 class="RecipeTitle">{{ $recipe->getrecipeTitle() }}</h3>
        @endif
    </a>
</article>
