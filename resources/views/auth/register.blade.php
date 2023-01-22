<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo" class="logo">
      @include('parts.header')
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4 validation__error-red" :errors="$errors" />

    <div class="auth-common__form">
      <p class="auth-common__form-title">Registration</p>
      <div class="auth-common__form-item">

        <form method="POST" action="{{ route('register') }}">
          @csrf
          <!-- Name -->
          <div class="auth-common__name-wrap">
            <input id="name" class="auth-common__name" type="text" name="name" placeholder="Username"
              value="{{ old('name') }}" required />
          </div>

          <!-- Email Address -->
          <div class="auth-common__email-wrap">
            <input id="email" class="auth-common__address" type="email" name="email" placeholder="Email"
              value="{{ old('email') }}" required />
          </div>

          <!-- Password -->
          <div class="auth-common__pass-wrap">
            <input id="password" class="auth-common__password" type="password" name="password" required
              autocomplete="new-password" placeholder="Password" />
          </div>

          <div class="auth-common__submit-wrap">
            <button class="auth-common__submit">登録</button>
          </div>
        </form>

      </div>
    </div>

  </x-auth-card>
</x-guest-layout>