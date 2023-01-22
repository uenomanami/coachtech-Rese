<div class="header" id="header">
  <div class="header__logo" id="header__logo">
    <div class="header__menu" id="header__menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    <h1 class="header__title" id="header__title">Rese</h1>
  </div>

  <div class="header__nav" id="header__nav">
    @auth
    <ul>
      <li><a href="/">Home</a></li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <li><a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit()">Logout</a></li>
      </form>

      <li><a href="/mypage">Mypage</a></li>
    </ul>
    @else
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/register">Registration</a></li>
      <li><a href="/login">Login</a></li>
    </ul>
    @endauth
  </div>
  
</div>