<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">

</head>
<body>
    <header name="logo" class="logo">
        @include('parts.header')
    </header>

    <div class="thanks__box">
      <p>会員登録ありがとうございます</p>
      <a href="/login">ログインする</a>
    </div>
</body>
  <script src="{{ asset('js/header.js') }}"></script>
</html> 