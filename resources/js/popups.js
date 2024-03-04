import Base from "./_base-controller";

export default class Popups extends Base {

    _init() {

        this.$popup = '[data-js="popup"]';

        return true;
    }

    _bind() {

        this._liveBindTo(this.$popup, 'click', (e) => {

            let popup_target = $(e.currentTarget).data('js-popup'),
                $target = $(`#${popup_target}`);

            if (popup_target !== undefined) {

                $.magnificPopup.close();

                setTimeout(() => {

                    this.open(popup_target, $target);
                }, 300);
            } else {

                this.open(popup_target, $target);
            }

            return false;
        });

        return true;
    }

    open(popup_target, $target) {
        $.magnificPopup.open({
            items: [
                {
                    src: '#' + popup_target,
                    type: 'inline',
                },
            ],
            removalDelay: 100,
            mainClass: 'mfp-fade',
            overflowY: 'scroll',
            callbacks: {
                beforeOpen: function () {
                    $('html').css('overflow', 'hidden');
                },
                open: () => {
                    $(window).trigger('modal:opened', $target);
                },
                afterClose: () => {
                    $('html').removeAttr('style');
                },
            },
        });
    }
}
