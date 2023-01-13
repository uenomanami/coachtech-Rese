<style>
    body {
        background-color: rgb(238, 238, 238);
        padding: 20px;
    }

    h1 {
        color: rgb(53, 96, 246);
    }
    
    .register__form {
        width: 350px;
        border-radius: 5px;
        margin: auto;
        box-shadow: 2px 2px 2px -1px;
    }

    .register__title {
        background-color: rgb(53, 96, 246);
        border-radius: 5px 5px 0 0;
        color: white;
        margin: 0;
        padding: 15px;
    }

    .register__item {
        padding: 10px;
        background-color: white;
        border-radius: 0 0 5px 5px;
    }

    .register__name,.register__address,.register__password {
        border: none;
        border-bottom: 1px solid black;
        display: block;
        width: 80%;
    }

    .register__name-wrap,.register__email-wrap,.register__pass-wrap {
        position: relative;
        margin-top: 18px;
        left: 45px;
    }

    .register__name-wrap::before {
        content: "";
        position: absolute;
        background: url("{{asset('images/username.png')}}");
        background-size: cover;
        vertical-align: middle;
        width: 20px;
        height: 20px;
        display: inline-block;
        bottom: 0;
        left: -30px;
    }

    .register__email-wrap::before {
        content: "";
        position: absolute;
        background: url("{{asset('images/email.png')}}");
        background-size: cover;
        vertical-align: middle;
        width: 20px;
        height: 20px;
        display: inline-block;
        bottom: 0;
        left: -30px;
    }

    .register__pass-wrap::before {
        content: "";
        position: absolute;
        background: url("{{asset('images/password.png')}}");
        background-size: cover;
        vertical-align: middle;
        width: 20px;
        height: 20px;
        display: inline-block;
        bottom: 0;
        left: -30px;
    }

    .register__submit-wrap{
        margin: 20px 20px 0 0;
        text-align: right;
    }

    .register__submit {
        background-color: rgb(53, 96, 246);
        color: white;
        font-weight: bold;
        padding: 5px 15px;
        border-radius: 3px;
        border: none;
    }

</style>

    <h1>Rese</h1>
    <div class="register__form">
        <p class="register__title">Registration</p>
        <div class="register__item">
        
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="register__name-wrap">
                    <input id="name" class="register__name" type="text" name="name" placeholder="Username" :value="old('name')" required />
                </div>
        
                <!-- Email Address -->
                <div class="register__email-wrap">
                    <input id="email" class="register__address" type="email" name="email" placeholder="Email" :value="old('email')" required />
                </div>
        
                <!-- Password -->
                <div class="register__pass-wrap">
                    <input id="password" class="register__password" type="password" name="password" required 
                                    autocomplete="new-password" placeholder="Password" />
                </div>
        
                <div class="register__submit-wrap">
                    <button class="register__submit">登録</button>
                </div>
            </form>
    
        </div>
    </div>
