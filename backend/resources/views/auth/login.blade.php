<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header class="header">
    <x-header></x-header>
</header>
<div class="login-page">
    <form class="login-page__form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-page__form-title">
            ログイン
        </div>

        <div class="login-page__form-item">
            <label for="email" class="login-page__form-label">メールアドレス</label>

            <div class="col-md-6">
                <input id="email" type="email" class=" login-page__text-field"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class=" login-page__form-item">
            <label for="password" class=" login-page__form-label">パスワード</label>

            <div class="col-md-6">
                <input id="password" type="password"
                       class="form-control login-page__text-field @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row login-page__form-item">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        ログイン状態を維持する
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0 login-page__form-item">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="submit-button">
                    ログイン
                </button>

                @if (Route::has('password.request'))
                    <a class="login-page__password-reset-link" href="{{ route('password.request') }}">
                        パスワードを忘れた方
                    </a>
                @endif
            </div>
        </div>
    </form>
</div>
</body>
</html>
