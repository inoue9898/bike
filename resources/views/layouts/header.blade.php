<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- ここにCSSやその他のヘッダー情報を記述 -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header class="header-4">
  <div class="header-inner">
    <div class="logo">
      井上 Bike 🛵💨
    </div>
    <nav class="header-nav">
      <div class="header-nav-item">
        <form id="searchForm" class="form2" action="{{ route('search') }}" method="GET">
          <input type="search" name="keyword" class="form2-input" placeholder="検索" />
          <button class="form2-button"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </nav>
  </div>
</header>


</body>
</html>