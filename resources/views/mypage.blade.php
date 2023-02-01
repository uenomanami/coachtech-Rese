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
        <div class="reserve-card__title">
          <p>予約&nbsp;{{ $key+1 }}</p>
          <form action="{{ route('reserve.delete', ['reserve_id' => $reserve->id ])}}" method="post">
            @csrf
            <button type="sumbit" onclick='return confirm("予約を取り消しますか？")'><img src="{{ asset('images/batu.png')}}"
                alt=""></button>
          </form>
        </div>
        <form action="{{ route('reserve.update', ['reserve_id' => $reserve->id ])}}" method="post">
          @csrf
          <table>
            <tr>
              <th>Shop</th>
              <td>{{ $reserve->getStorename() }}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{
                \Carbon\Carbon::createFromTimeString($reserve->start_at)->format('Y-m-d') }}</td>
              <td class="reserve-date" id="reserve-date__change">→&nbsp;
                <input type="date" class="reserve__date" name="date">
              </td>
            </tr>
            <tr>
              <th>Time</th>
              <td id="reserve-time">{{ \Carbon\Carbon::createFromTimeString($reserve->start_at)->format('H:i') }}</td>
              <td>→&nbsp;
                <select name="start_at">
                  <option value="17:00">17:00</option>
                  <option value="17:30">17:30</option>
                  <option value="18:00">18:00</option>
                  <option value="18:30">18:30</option>
                  <option value="19:00">19:00</option>
                  <option value="19:30">19:30</option>
                  <option value="20:00">20:00</option>
                  <option value="20:30">20:30</option>
                  <option value="21:00">21:00</option>
                </select>
              </td>
            </tr>
            <tr>
              <th>Number</th>
              <td>{{ $reserve->num_of_people }}人</td>
              <td>→&nbsp;
                <select name="num_of_people">
                  <option value="1">1人</option>
                  <option value="2">2人</option>
                  <option value="3">3人</option>
                  <option value="4">4人</option>
                  <option value="5">5人</option>
                  <option value="6">6人</option>
                  <option value="7">7人</option>
                  <option value="8">8人</option>
                </select>
              </td>
            </tr>
          </table>
          <div class="reserve-card__change" id="reserve-card__change">
            <button type="submit" onclick='return confirm("予約を変更しますか？")'>予約内容を変更</button>
          </div>
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
  <script src=" {{ asset('js/mypage.js') }}"></script>
</body>

</html>