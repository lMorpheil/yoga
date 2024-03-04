import Base from './_base-controller';

export default class Map extends Base {
    _init() {
        this.map = $('#map');

        return !!this.map;
    }

    _bind() {
        return true;
    }
}
ymaps.ready(function () {
    let isAstra = window.location.hostname.includes('astra'),
        i = isAstra ? 46.30538907444924 : 55.762510,
        k = isAstra ? 47.991254499999926 : 37.719405;

    var myMap = new ymaps.Map('map', {
            center: [i, k],
            zoom: 16
        }, {
            searchControlProvider: 'yandex#search'
        }),

        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="background: rgba(193, 129, 255, 0.36);position: absolute;top: 0; bottom: 0;left: 0;right: 0"></div>'
        ),

        // myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
        //     hintContent: 'Собственный значок метки',
        //     balloonContent: 'Это красивая метка'
        // }, {
        //     // Опции.
        //     // Необходимо указать данный тип макета.
        //     iconLayout: 'default#image',
        //     // Своё изображение иконки метки.
        //     iconImageHref: 'image/baloon.svg',
        //     // Размеры метки.
        //     iconImageSize: [30, 42],
        //     // Смещение левого верхнего угла иконки относительно
        //     // её "ножки" (точки привязки).
        //     iconImageOffset: [-5, -38]
        // }),
        myPlacemarkWithContent = new ymaps.Placemark([i, k], {
            hintContent: 'Ретритный центр "Финиш"',
            balloonContent: window.location.hostname.includes('astra') ? 'Астрахань, Адмирала Нахимова, 135а' : 'Москва, ул. Дворникова, д 7',
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: 'image/baloon.svg',
            // Размеры метки.
            iconImageSize: [48, 48],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.
            iconContentOffset: [15, 15],
            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
        });

    myMap.geoObjects
        // .add(myPlacemark)
        .add(myPlacemarkWithContent);
});
