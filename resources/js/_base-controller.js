
/**
 * Дефолтный контроллер
 */
export default class Base {

    /**
     * @param options
     */
    constructor(options = {}) {

        try {
            this._construct(options);
        } catch (error) {
            console.error(error);
        }
    }

    /**
     * Постройка класса
     *
     * @private
     */
    _construct(options = {}) {
        this.options = options;
        this.modules = {};

        this.initialized = this._init();

        if (this.initialized) {
            this.binded = this._bind();
        }

        return this;
    }

    /**
     * @returns {boolean}
     */
    _init() {
        return true;
    }

    /**
     * @returns {boolean}
     */
    _bind() {
        return true;
    }

    /**
     * @param $element
     * @param event_name
     * @param callback
     */
    _bindTo($element, event_name, callback) {
        $element.each((i, e) => {
            let $elem = $(e);

            if (! $elem.length || ! event_name) {
                return;
            }

            let event = this._parseEventName(event_name);

            $elem.off(event).on(event, (e, p) => {
                if ($.isFunction(callback)) {
                    callback(e, p);
                }
            });
        });
    }

    /**
     * Нормализцует event
     *
     * @param event_name
     * @returns {*}
     */
    _parseEventName(event_name) {
        let split = event_name.split(' '),
            event = `${event_name}.${this.constructor.name}`;

        if (split.length > 1) {
            event = [];

            $.each(split, (i, e) => {
                event.push(`${e}.${this.constructor.name}`);
            });

            event = event.join(' ');
        }

        return event;
    }

    /**
     * @param selector
     * @param event_name
     * @param callback
     */
    _liveBindTo(selector, event_name, callback) {
        if (! $.trim(selector) || ! event_name) {
            return;
        }

        let event = this._parseEventName(event_name);

        $(document, window).off(event, selector).on(event, selector, (e, p) => {
            if ($.isFunction(callback)) {
                callback(e, p);
            }
        });
    }

    /**
     * Скролл к элементу
     *
     * @param $element
     * @param header_height
     * @param callback
     * @param speed
     * @param easing
     */
    _scrollTo($element, header_height = 0, callback = null, speed = 300, easing = 'swing') {

        if (! $element.length) {
            return false;
        }

        if ($element.is('.scrolled')) {
            return false;
        }

        $element.addClass('scrolled');

        let scroll;

        scroll = parseInt($element.offset().top) - header_height;

        $('html, body').animate({
            scrollTop: scroll,
        }, speed, easing, () => {
        }).promise().then(() => {
            if ($.isFunction(callback)) {
                callback();
            }

            $element.removeClass('scrolled');
        });
    }

    /**
     * Получить хэш параметры
     *
     * @returns {{}}
     */
    _getHashParams() {
        let hash_params = {};

        let e,
            a = /\+/g,
            r = /([^&;=]+)=?([^&;]*)/g,
            q = window.location.hash.substring(1),
            d = function (s) {
                return decodeURIComponent(s.replace(a, ' '));
            };

        while (e = r.exec(q)) {
            hash_params[d(e[1])] = d(e[2]);
        }

        return hash_params;
    }
    /**
     * Null Safe
     *
     * @param chain_func
     * @returns {*}
     */
    _nullSafe(chain_func) {
        let result;

        try {
            result = chain_func();
        } catch (e) {

        }

        return result;
    }
}
