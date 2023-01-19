<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/auth/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>

<body>
  <header name="logo" class="logo">
    @include('parts.header')
  </header>

  <main>
    @foreach ($stores as $store)
    <div class="shop__card">
      <div class="shop__card-img">
        <img src="{{ $store->image_url }}" alt="">
      </div>
      <div class="shop__card-content">
        <h2 class="card-content__name">{{ $store->name }}</h2>
        <p class="card-content__area">{{ $store->getArea() }}</p>
        <p class="card-content__category">{{ $store->getCategory() }}</p>
        <div class="card-content__item">
          <a href="/detail/{shop_id}">詳しくみる</a>
          <!-- <button></button> -->
        </div>
      </div>
    </div>
    @endforeach
</main>

  <script src="{{ asset('js/header.js') }}"></script>
</body>
</html>