<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
</head>

<body>
  <header name="logo" class="logo">
    @include('parts.header')
  </header>
  <p class="mypage__user-name">{{ $user->name }}さん</p>
  <main>

    <div class="mypage__reserve">
      <h2>予約状況</h2>
      @foreach( $reserves as $key => $reserve)
      <div class="mypage__reserve-card">
        <form action="{{ route('reserve.delete', ['reserve_id' => $reserve->id ])}}" method="post"
          onclick='return confirm("予約を取り消しますか？")'>
          @csrf
          <div class="reserve-card__title">
            <p>予約&nbsp;{{ $key+1 }}</p>
            <button type="sumbit"><img src="{{ asset('images/batu.png')}}" alt=""></button>
          </div>
          <table>
            <tr>
              <th>Shop</th>
              <td>{{ $reserve->getStorename() }}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{ \Carbon\Carbon::createFromTimeString($reserve->start_at)->format('Y-m-d') }}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{ \Carbon\Carbon::createFromTimeString($reserve->start_at)->format('H:i') }}</td>
            </tr>
            <tr>
              <th>Number</th>
              <td>{{ $reserve->num_of_people }}人</td>
            </tr>
          </table>
        </form>
      </div>
      @endforeach
    </div>

    <div class="my_page__favorite">
      <h2>お気に入り店舗</h2>
      @foreach ($stores as $store)
      <div class="shop__card">
        <div class="shop__card-img">
          <img src="{{ $store->image_url }}" alt="">
        </div>
        <div class="shop__card-content">
          <h3 class="card-content__name">{{ $store->name }}</h3>
          <p class="card-content__area">{{ $store->getArea() }}</p>
          <p class="card-content__category">{{ $store->getCategory() }}</p>
          <div class="card-content__item">
            <form action="/detail/" method="get">
              <button class="to-detail__button" name="store_id" value="{{ $store->id }}" type="submit">詳しくみる</button>
            </form>

            <form action="{{ route('favorite.delete', ['store_id' => $store->id ])}}" method="post"
              onclick='return confirm("お気に入りを取り消しますか？")'>
              @csrf
              <button type="submit" class="favorite__btn">
                <img src="{{ asset('images/heart-red.png') }}" alt="">
              </button>
            </form>

          </div>
        </div>
      </div>
      @endforeach
    </div>
  </main>
  <script src=" {{ asset('js/header.js') }}"></script>
</body>

</html>