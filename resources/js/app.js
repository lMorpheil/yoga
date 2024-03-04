require('./bootstrap');

/* Плагины */
import 'slick-carousel';
import 'magnific-popup';

import Base from "./_base-controller";

/* Модули*/
import MainSlider from './main-slider';
import Tabs from "./tabs";
import Popups from "./popups";
import NewsSlider from "./news-slider";
import Map from "./map";
import ScrollTo from "./scroll-to";
import Employees from "./employees";
import Reviews from "./reviews";
import Burger from "./burger";
import Actions from "./actions";
import Price from "./price"
import Faq from "./_faq";
import Forms from "./forms";

class ContextApp extends Base {
    /**
     * @returns {boolean}
     * @private
     */
    _init() {
        new Popups();
        new MainSlider();
        new Tabs();
        new NewsSlider();
        new Map();
        new Employees();
        new Reviews();
        new Burger();
        new Actions();
        new Price();
        new Faq();
        new Forms();

        // Прокрутка к элементам
        this.scrollTo = new ScrollTo({
            mobile_width: 1024,
            mobile_hh: 0,
            mobile_hh_small: 0,
            pc_hh: 0,
            pc_hh_small: 0,
        });

        return true;
    }
}

window.ContextApp = new ContextApp();
