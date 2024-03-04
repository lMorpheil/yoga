<header class="header{{ !Request::is('/') ? ' header_dark' : '' }}">
    <div class="container">
        <div class="header__grid">
            @if( Request::is('/') )
                <div class="header__logo">
                    <img src="/image/logo.png" alt="">
                </div>
            @else
                <a class="header__logo" href="{{ route('index') }}">
                    <img src="/image/logo.png" alt="">
                </a>
            @endif

            <nav class="menu header__menu">
                <ul>
                    <li class="menu__item"><a class="menu__link" href="{{ Request::is('/') ? 'javascript:void(0)' : route("index") . '/#scrollTo=_target:about' }}" data-js-scroll-to="about">Наш центр</a></li>
                    <li class="menu__item"><a class="menu__link" href="{{ Request::is('/') ? 'javascript:void(0)' : route("index") . '/#scrollTo=_target:directions' }}" data-js-scroll-to="directions">Направления</a></li>
                    <li class="menu__item"><a class="menu__link" href="{{ route('schedule') }}">Расписание</a></li>
                    <li class="menu__item"><a class="menu__link" href="{{ Request::is('/') ? 'javascript:void(0)' : route("index") . '/#scrollTo=_target:main-slider' }}" data-js-scroll-to="main-slider">Галерея</a></li>
                    <li class="menu__item"><a class="menu__link" href="{{ route('news') }}">Новости</a></li>
                    <li class="menu__item"><a class="menu__link" href="javascript:void(0)" data-js-scroll-to="footer">Контакты</a></li>
                </ul>
            </nav>
            <a class="header__phone" href="tel:{!! Request::is('energy') ? '+79881739293' : '+79165163933' !!}" class="header__phone">{!! Request::is('energy') ? '8 (988) <span>173-92-93</span>' : '8 (916) <span>516-39-33</span>' !!}</a>
            <button class="btn btn_black header__callback-btn" data-js="popup"
                    data-js-popup="consultation">Записаться на&nbsp;консультацию</button>
            <button class="header__burger" data-burger-menu>
                <span class="item"></span>
                <span class="item"></span>
                <span class="item"></span>
            </button>
        </div>
    </div>
</header>
