import Base from "./_base-controller";

export default class Burger extends Base {
    _init() {
        this.burger = $('[data-burger-menu]');

        return !!this.burger.length;
    }

    _bind() {
        this._bindTo(this.burger, 'click', (e) => {
            let $this = $(e.currentTarget),
                $menu = $this.closest('.header').find('.header__menu');

            $menu.toggleClass('opened');
            $this.toggleClass('open');
            $this.children().toggleClass('open');
        });

        return true;
    }
}
