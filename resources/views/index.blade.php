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
          <form action="/detail/" method="get">
            <button class="to-detail__button" name="store_id" value="{{ $store->id }}" type="submit">詳しくみる</button>
          </form>

          @auth
          @if (!Auth::user()->is_favorite($store->id))
          <form action="/favorite" method="get">
            @csrf
            <button type="submit" class="favorite__btn" name="store_id" value="{{ $store->id }}"><img
                src="{{ asset('images/heart-gray.png') }}" alt=""></button>
          </form>
          @else
          <form action="/favorite/delete" method="get">
            @csrf
            <button type="submit" class="favorite__btn" name="store_id" value="{{ $store->id }}"><img
                src="{{ asset('images/heart-red.png') }}" alt=""></button>
          </form>
          @endif
          @endauth

        </div>
      </div>
    </div>
    @endforeach
  </main>

  <script src="{{ asset('js/header.js') }}"></script>
</body>

</html>