<header>
    <div class="header-center-wrapper">
        <div class="header-left">
            <a href="{{ route('store') }}">Магазин</a>
            <a href="{{ route('store') }}">House Колекція</a>
            <a href="{{ route('index') }}#about-us">Про нас</a>
        </div>
        <div class="header-center">
            <a href="{{ route('index') }}"><img src="{{ asset('img/Logo.svg') }}" /></a>
        </div>
        <div class="header-right">
            <a href="https://www.instagram.com/zelenskiy_official" target="_blank">Майстер-класи</a>
            <a href="{{ route('adress') }}">Де купити</a>
            <a href="{{ route('contacts') }}">Контакти</a>
        </div>

        <div class="burger-menu-wrapper">
            <div class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="burger-menu">
                <a href="{{ route('store') }}">Магазин</a>
                <a href="{{ route('store') }}">HOUSE Колекція</a>
                <a href="{{ route('index') }}#about-us">Про нас</a>
                <a href="https://www.instagram.com/zelenskiy_official">Майстер-класи</a>
                <a href="{{ route('adress') }}">Де купити</a>
                <a href="{{ route('contacts') }}">Контакти</a>
                <div class="social-icons">
                    <a href="https://www.instagram.com/sup_cs" target="_blank">
                        <img src="{{ asset('img/instblack.svg') }}" alt="">
                    </a>
                    <a href="https://t.me/V_Zelenskiy_official" target="_blank">
                        <img src="{{ asset('img/telegramblack.svg') }}" alt="">
                    </a>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">
                        <img src="{{ asset('img/youtubeblack.svg') }}" alt="">
                    </a>
                    <a href="https://www.facebook.com/dmytroasparian" target="_blank">
                        <img src="{{ asset('img/facebookblack.svg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="burger-menu-overlay hidden"></div>
</header>
