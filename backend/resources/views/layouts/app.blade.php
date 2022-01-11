<!DOCTYPE html>
<html dir="ltr" lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="ホームページサンプル株式会社 | ホームページサンプル株式会社では最新技術と自然との調和を目指します。">
        <meta name="keywords" content="">
        <title>ホームページサンプル株式会社 | ホームページサンプル株式会社では最新技術と自然との調和を目指します。</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="screen">
        @livewireStyles
    </head>
    <body>
        <header id="header">
            <div class="header-inner inner">
              <div class="logo">
                <a href="{{ route('recipes') }}"><img src="images/cookRecipeIcon.png" /></a>
              </div>
              <nav class="header-nav">
                <div class="header-nav-item">
                  {{-- <form class="form2">
                    <input type="search" class="form2-input" placeholder="search" />
                    <button class="form2-button"><i class="fa fa-search"></i></button>
                  </form> --}}
                </div>
                {{-- <div class="header-nav-item">
                  <img src="https://placehold.jp/50x50.png" class="header-avatar" />
                </div> --}}
              </nav>
            </div>
          </header>

        @yield('content')

        <!-- フッター -->
        <div id="footer">
            <div class="inner">
            <section class="gridWrapper">
                <article class="grid copyright">
                    Copyright(c) 2012 Sample Inc. All Rights Reserved. Design by <a href="http://f-tpl.com" target="_blank" rel="nofollow">http://f-tpl.com</a>
                </article>
            </section>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
