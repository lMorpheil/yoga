import Base from "./_base-controller";
export default class ScrollTo extends Base {

    /**
     * Инициализация
     *
     * @returns {boolean}
     */
    _init() {

        this.selector = '[data-js-scroll-to]';

        // Порог перехода шапки в мобильную
        this.mobile_width    = this.options.mobile_hh || 1024;
        // Высота мобильной шапки
        this.mobile_hh       = this.options.mobile_hh || 0;
        // Высота свёрнутой мобильной шапки
        this.mobile_hh_small = this.options.mobile_hh_small || 0;
        // Высота шапки
        this.pc_hh           = this.options.pc_hh || 0;
        // Высота свёрнутоё шапки
        this.pc_hh_small     = this.options.pc_hh_small || 0;

        return true;
    }

    _bind() {

        // Скролл по хэшу, если хэш изменился
        this._bindTo($(window), 'hashchange', () => {
            this.hashScroll();
        });

        // Скролл по хэшу
        this._bindTo($(window), 'load', () => {
            this.hashScroll();
        });

        // Скролл по клику
        this._liveBindTo(this.selector, 'click', (e) => {
            let $current = $(e.currentTarget),
                target   = $current.data('js-scroll-to'),
                $target  = $(`[data-js-scroll-target="${target}"]`);

            if ( ! $target.length) {
                return false;
            }

            if ($target.closest('.spoiler')) {
                let $spoiler_button = $target.closest('.spoiler-wrapper').find('.spoiler__button:not(.visible)');

                $spoiler_button.trigger('click');
                this._scrollTo($target, this.getHeaderHeight($target));

                return false
            }

            this._scrollTo($target, this.getHeaderHeight($target));
        });

        return true;
    }

    /**
     * Получить высоту шапки
     *
     * @returns {number}
     */
    getHeaderHeight($target) {
        let header_height;

        if ($(window).width() >= this.mobile_width) {
            header_height = $target.offset().top < $(window).scrollTop() ? this.pc_hh : this.pc_hh_small;
        } else {
            header_height = $target.offset().top < $(window).scrollTop() ? this.mobile_hh : this.mobile_hh_small;
        }

        return header_height;
    }

    /**
     * Скроллы по хэшу
     */
    hashScroll() {
        // Пример хэша — #scrollTo=_target:calculator
        let scroll_to = this._nullSafe(() => {
            return this._getHashParams().scrollTo;
        });

        if (scroll_to) {
            scroll_to = scroll_to.split(':');

            switch (true) {

                case(scroll_to[0] === '_target'):
                    this.scrollToTarget(scroll_to[1]);
                    break;
            }
        }
    }

    /**
     * Скролл к элементу
     *
     * @param target
     */
    scrollToTarget(target) {
        let $target = $(`[data-js-scroll-target="${target}"]`);

        this._scrollTo($target, this.getHeaderHeight($target));
    }
}
