<footer class="footer{{ !Request::is('/schedule') ? ' footer_dark' : '' }}" data-js-scroll-target="footer">
    <div class="container">
        <div class="footer__grid">
            <div class="footer__contacts">
                <h2 class="h2">
                    Контакты
                </h2>
                <div class="footer__title">
                    Адрес:
                </div>
                <div class="footer__address">
                    {!! str_contains(request()->getHttpHost(), 'astra') ? 'Астрахань,<br> Адмирала Нахимова, 135а' : 'Москва, ул. Дворникова, д 7' !!}
                </div>
                <div class="footer__title">
                    Номер телефона:
                </div>
                <a href="tel:{!! Request::is('energy') ? '+79881739293' : '+79165163933' !!}" class="footer__phone">{!! Request::is('energy') ? '+7 (988) 173-92-93' : '+7 (916) 516-39-33' !!}</a>
                <div class="socials footer__socials">
                    <a class="socials__ig" href="https://instagram.com/rc_finish?igshid=YTQwZjQ0NmI0OA==" target="_blank"></a>
                    <a class="socials__tg" href="https://t.me/R_C_FINISH" target="_blank"></a>
                </div>
            </div>
            <div class="footer__map" id="map"></div>
        </div>
    </div>
    <div class="footer__ribbon"></div>
</footer>
