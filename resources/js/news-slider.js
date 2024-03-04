import Base from "./_base-controller";
export default class NewsSlider extends Base {
    _init() {
        this.$wrapper = $('[data-news-slider]');
        this.$navigations = $('[data-news-slider-nav]')

        this.options = {
            arrows: true,
            prevArrow: this.$navigations.find('.prev'),
            nextArrow: this.$navigations.find('.next'),
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
        };

        return !!this.$wrapper.length;
    }

    _bind() {
        if ($(window).width() < 768) {
            this.$wrapper.slick(this.options);
        }

        return true;
    }
}


