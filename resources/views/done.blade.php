<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>予約完了</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/done.css') }}">
</head>

<body>
  <header name="logo" class="logo">
    @include('parts.header')
  </header>

  <div class="done__box">
    <p>ご予約ありがとうございます</p>
    <a href="/">戻る</a>
  </div>

  <script src=" {{ asset('js/header.js') }}"></script>
</body>

</html>