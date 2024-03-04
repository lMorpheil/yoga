import Base from "./_base-controller";

export default class Employees extends Base {
    _init() {
        this.$wrapper = $('[data-employees-wrapper]');
        this.$navigations = $('[data-employees-navigation]');
        this.options = {
            arrows: true,
            prevArrow: this.$navigations.find('.prev'),
            nextArrow: this.$navigations.find('.next'),
            variableWidth: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
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

        return true;
    }
}
