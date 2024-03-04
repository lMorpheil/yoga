import Base from "./_base-controller";

export default class Reviews extends Base {
    _init() {
        this.$slider = $('[data-reviews-slider]');
        this.$navigations = $('[data-reviews-navigations]');
        this.options = {
            arrows: true,
            dots: true,
            prevArrow: this.$navigations.find('.prev'),
            nextArrow: this.$navigations.find('.next'),
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        dots: false,
                    },
                },
            ],
        };

        return !!this.$slider.length;
    }

    _bind() {
        this.$slider.slick(this.options);

        return true;
    }
}
