<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $store->name }}</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
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
    @auth
    <div class="detail__reserve">
      <form action="{{ route('reserve', ['store_id' => $store->id ])}}" method="post">
        @csrf
        <div class="detail__reserve-wrap">
          <p class="reserve__title">予約</p>

          <input type="date" class="reserve__date" name="date">
          @if ($errors->has('date'))
          <p class="validation__error-red">Error:{{$errors->first('date')}}</p>
          @endif
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

          @if ($errors->has('start_at'))
          <p>Error:{{$errors->first('start_at')}}</p>
          @endif
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
          @if ($errors->has('num_of_people'))
          <p>Error:{{$errors->first('num_of_people')}}</p>
          @endif

          <div class="overflow-scroll">
            @if (Auth::user()->is_reserve($store->id))
            @foreach($reserves as $reserve)
            <div class="detail__reserve-card">
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
            </div>
            @endforeach
            @endif
          </div>
        </div>

        <button class="reserve__submit" type="submit" name="store_id" value="{{ $store->id }}">予約する</button>
      </form>
    </div>
    @endauth
  </main>

  <script src=" {{ asset('js/header.js') }}"></script>
</body>

</html>