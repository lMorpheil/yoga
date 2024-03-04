import Base from "./_base-controller";

export default class Actions extends Base {
    _init() {
        this.$wrapper = $('[data-actions-wrapper]');

        return !!this.$wrapper.length;
    }

    _bind() {
        let slider = this.$wrapper.find('[data-actions-slider]'),
            navigation = this.$wrapper.find('[data-actions-navigation]'),
            prev = navigation.find('.prev'),
            next = navigation.find('.next'),
            options = {
                arrows: true,
                prevArrow: prev,
                nextArrow: next,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
            };

        if ($(window).width() < 768) {
            slider.slick(options);
        }

        return true;
    }
}
