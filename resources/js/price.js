import Base from "./_base-controller";
export default class Price extends Base {
    _init() {
        this.$wrapper = $('[data-price-slider]');
        this.$navigations = $('[data-price-nav]');
        this.$btnsPriceWrapper = '[data-price-btns]';
        this.$content = $('[data-price-content]');

        this.options = {
            arrows: true,
            prevArrow: this.$navigations.find('.prev'),
            nextArrow: this.$navigations.find('.next'),
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            adaptiveHeight: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        };

        return !!this.$wrapper.length;
    }

    _bind() {
        this.$wrapper.slick(this.options);

        this._liveBindTo('.directions__btn-block > *', 'click', (e) => {
            let $label = $(e.currentTarget);

            if (this.isActive($label)) {
                return false;
            }

            let index,
                $wrapper = $label.closest(this.$btnsPriceWrapper),
                $labels = $wrapper.find('.directions__btn-block > *');

            this.$content.each((i, el) => {
                let $tabs = $(el).find('.price__content-wrapper');

                this.resetTabs($labels, $tabs);

                index = $label.index();

                this.chooseLabel($label);
                this.chooseTab($tabs.eq(index));
            });
        });

        return true;
    }

    isActive($label) {
        return $label.is('.action-price');
    }

    resetTabs($labels, $tabs) {
        $labels.removeClass('action-price');
        $tabs.removeClass('action-price');
    }

    chooseLabel($label) {
        $label.addClass('action-price');
    }

    chooseTab($tab) {
        $tab.addClass('action-price');

        // Выравниваем слайдер
        let $slider = $tab.find('[data-js="image-slider"]');

        if (! $slider.data('re-inited') && $slider.length) {
            let options = $slider.get(0).slick.options;
            $slider.slick('unslick');
            $slider.slick(options);
            $slider.data('re-inited', true);
        }

        let $tabs_services = $tab.find('[data-js-slider="tabs-services"]');

        if ($(window).width() <= 1023) {
            if ($tabs_services.length) {
                let options = $tabs_services.get(0).slick.options;

                $tabs_services.slick('unslick');
                $tabs_services.slick(options);
            }
        }
    }
}


