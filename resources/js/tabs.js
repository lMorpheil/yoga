import Base from "./_base-controller";
export default class Tabs extends Base {

    _init() {
        this.tabs_wrapper = '[data-tabs]';
        this.sub_tabs_wrapper = '[data-sub-tabs]';
        return !! this.tabs_wrapper;
    }

    _bind() {
        this._liveBindTo('.tabs__nav > *', 'click', (e) => {
            let $label = $(e.currentTarget);

            if (this.isActive($label)) {
                return false;
            }

            let index,
                $wrapper       = $label.closest(this.tabs_wrapper),
                $labels        = $wrapper.find('.tabs__nav > *'),
                $tabs_contents = $wrapper.find('.tabs__content');

            $tabs_contents.each((i, el) => {
                let $tabs = $(el).find('.tab');

                this.resetTabs($labels, $tabs);

                index = $label.index();

                this.chooseLabel($label);
                this.chooseTab($tabs.eq(index));
            });
        });

        this._liveBindTo('.sub-tabs__nav > *', 'click', (e) => {
            let $label = $(e.currentTarget);

            if (this.isActive($label)) {
                return false;
            }

            let index,
                $wrapper       = $label.closest(this.sub_tabs_wrapper),
                $labels        = $wrapper.find('.sub-tabs__nav > *'),
                $tabs_contents = $wrapper.find('.sub-tabs__content');

            $tabs_contents.each((i, el) => {
                let $tabs = $(el).find('.sub-tab');

                this.resetTabs($labels, $tabs);

                index = $label.index();

                this.chooseLabel($label);
                this.chooseTab($tabs.eq(index));
            });
        });

        return true;
    }
    /**
     * Сброс всех табов
     *
     * @param $labels
     * @param $tabs
     */
    resetTabs($labels, $tabs) {
        $labels.removeClass('active');
        $tabs.removeClass('active');
    }
    /**
     * Это активный таб?
     *
     * @param $label
     */
    isActive($label) {
        return $label.is('.active');
    }
    /**
     * Подсветка лейбла
     *
     * @param $label
     */
    chooseLabel($label) {
        $label.addClass('active');
    }

    /**
     * Показ таба
     *
     * @param $tab
     */
    chooseTab($tab) {
        $tab.addClass('active');

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
