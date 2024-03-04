import Base from "./_base-controller";
export default class MainSlider extends Base {
    _init() {
        this.$wrapper = $('[data-main-slider]');
        this.$navigations = $('[data-main-slider-nav]')

        this.options = {
            arrows: true,
            prevArrow: this.$navigations.find('.prev'),
            nextArrow: this.$navigations.find('.next'),
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        adaptiveHeight: true,
                    },
                },
            ],
        };

        return !!this.$wrapper.length;
    }

    _bind() {
        this.$wrapper.slick(this.options);

        return true;
    }
}


