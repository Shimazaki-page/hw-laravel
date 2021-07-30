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
<div class="main">
        <div class="menu">
            <ul class="menu__lists">
                <li class="menu__list"><a href="{{route('top')}}" class="menu__link">クラス一覧</a></li>
                <li class="menu__list"><a href="{{route('students.students-list')}}" class="menu__link">生徒一覧</a></li>
                <li class="menu__list"><a href="{{route('add-student-form')}}" class="menu__link">生徒追加</a></li>
            </ul>
        </div>
    <div class="contents">
        @yield('main')
    </div>
</div>

</body>
</html>
