<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$store->name}}</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/auth/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/detail.css') }}">


</head>

<body>
  <header name="logo" class="logo">
    @include('parts.header')
  </header>

  <main>
    <div class="detail__store">
      <div class="detail__store-name">
        <a href="/" class="back__button">&lt;</a>
        <h2>{{ $store->name }}</h2>
      </div>
      <img src="{{ $store->image_url }}" alt="">
      <div class="detail__store-item">
        <p class="detail__store-area">{{ $store->getArea() }}</p>
        <p class="detail__store-category">{{ $store->getCategory() }}</p>
      </div>
      <p class="detail__store-description">{{ $store->description }}</p>
    </div>


    <div class="detail__reserve">
      <form action="" method="get">

        <div class="detail__reserve-wrap">
          <p class="reserve__title">予約</p>
          <input type="date" class="reserve__date">
          <select name="reserve__start-at">
            <option value="pm5">17:00</option>
            <option value="pm5h">17:30</option>
            <option value="pm6">18:00</option>
            <option value="pm6h">18:30</option>
            <option value="pm7">19:00</option>
            <option value="pm7h">19:30</option>
            <option value="pm8">20:00</option>
            <option value="pm8h">20:30</option>
            <option value="pm9">21:00</option>
          </select>

          <select name="reserve__num">
            <option value="1">1人</option>
            <option value="2">2人</option>
            <option value="3">３人</option>
            <option value="4">4人</option>
            <option value="5">５人</option>
            <option value="6">６人</option>
            <option value="7">７人</option>
            <option value="8">８人</option>
          </select>

          <table>

          </table>

        </div>

        <button class="reserve__submit" type="submit">予約する</button>
      </form>
    </div>
  </main>
  <script src="{{ asset('js/header.js') }}"></script>
</body>

</html>