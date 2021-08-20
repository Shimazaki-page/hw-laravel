<div class="header__container">
    <div class="header__contents--left">
            <p class="header__logo">HOMEWORKing</p>
    </div>
    <div class="header__contents--right">
        @auth
            <form action="{{route('logout')}}" method="post">
                @csrf
                <input class="header__logout-button" type="submit" value="ログアウト">
            </form>
        @endauth
    </div>
</div>
