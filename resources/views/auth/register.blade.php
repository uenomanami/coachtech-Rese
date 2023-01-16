<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo" class="logo">
            @include('parts.header')
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 validation__error-red" :errors="$errors" />

        <div class="register__form">
            <p class="register__form-title">Registration</p>
            <div class="register__form-item">
        
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div class="register__name-wrap">
                        <input id="name" class="register__name" type="text" name="name" placeholder="Username" value="{{ old('name') }}" required />
                    </div>

                    <!-- Email Address -->
                    <div class="register__email-wrap">
                        <input id="email" class="register__address" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                    </div>

                    <!-- Password -->
                    <div class="register__pass-wrap">
                        <input id="password" class="register__password" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                    </div>
        
                    <div class="register__submit-wrap">
                        <button class="register__submit">登録</button>
                    </div>
                </form>

            </div>
        </div>

    </x-auth-card>
</x-guest-layout>
