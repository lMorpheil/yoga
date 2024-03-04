import Base from "./_base-controller";
export default class Faq extends Base {
    _init() {
        this.$btnsWrapper = '[data-faq-btns]';
        this.$content = $('[data-faq-wrapper]');

        return true;
    }

    _bind() {
        this._liveBindTo('.directions__btn-block > *', 'click', (e) => {
            let $label = $(e.currentTarget);

            if (this.isActive($label)) {
                return false;
            }

            let index,
                $wrapper = $label.closest(this.$btnsWrapper),
                $labels = $wrapper.find('.directions__btn-block > *');

            this.$content.each((i, el) => {
                let $tabs = $(el).find('.faq__grid');

                this.resetTabs($labels, $tabs);

                index = $label.index();

                this.chooseLabel($label);
                this.chooseTab($tabs.eq(index));
            });
        });

        this._liveBindTo('.faq__item > *', 'click', (e) => {
            let $btn = $(e.target),
                wrapper = $btn.closest('.faq__item'),
                content = wrapper.find('.faq__expand');

            if (this.isActive($btn)) {
                $btn.removeClass('action');
                content.removeClass('action');

                return false;
            }

            $btn.addClass('active');
            content.addClass('action');
        });

        return true;
    }

    isActive($label) {
        return $label.is('.action');
    }

    resetTabs($labels, $tabs) {
        $labels.removeClass('action');
        $tabs.removeClass('action');
    }

    chooseLabel($label) {
        $label.addClass('action');
    }

    chooseTab($tab) {
        $tab.addClass('action');

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
