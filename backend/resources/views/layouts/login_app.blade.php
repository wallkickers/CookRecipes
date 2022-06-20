<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>作り置きのレシピをメモする「CookRecipe」</title>
        <meta name="description" content="CookRecipe | あなたの作り置きライフをサポートします。">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/destyle.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app_style.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        @livewireStyles
    </head>
    <body>
        <header id="header">
            <div class="header-inner inner">
              <div class="logo">
                <a href="{{ route('recipes') }}"><img src="{{ asset('images/cookRecipeIcon.png') }}" alt="logo"/></a>
              </div>
              <nav class="header-nav">
                <div class="header-nav-item">
                    {{-- <form class="form2">
                        <input type="search" class="form2-input" placeholder="search" />
                        <button class="form2-button"><i class="fa fa-search"></i></button>
                      </form> --}}
                    <a href="{{ route('shopping_things.index') }}" class="Header-Btn">お買い物メモ</a>
                    <a href="{{ route('recipe_create') }}" class="Header-Btn">レシピ追加</a>
                </div>
              </nav>
            </div>
          </header>

        @yield('content')
        @yield('scripts')

        {{-- <footer>
            <section class="gridWrapper">
                <p class="copyright">© 2022 TM.Dev</p>
            </section>
        </footer> --}}
        @livewireScripts
    </body>
</html>
