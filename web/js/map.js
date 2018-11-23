ymaps.ready(init);

function init () {
    var myMap = new ymaps.Map("map", {
            center: [61.675852, 50.763447],
            zoom: 10
        }, {
            searchControlProvider: 'yandex#search'
        }),
        // Создание макета содержимого хинта.
        // Макет создается через фабрику макетов с помощью текстового шаблона.
        HintLayout = ymaps.templateLayoutFactory.createClass( "<div class='my-hint'>" +
            "<b>{{ properties.object }}</b><br />" +
            "{{ properties.address }}" +
            "</div>", {
                // Определяем метод getShape, который
                // будет возвращать размеры макета хинта.
                // Это необходимо для того, чтобы хинт автоматически
                // сдвигал позицию при выходе за пределы карты.
                getShape: function () {
                    var el = this.getElement(),
                        result = null;
                    if (el) {
                        var firstChild = el.firstChild;
                        result = new ymaps.shape.Rectangle(
                            new ymaps.geometry.pixel.Rectangle([
                                [0, 0],
                                [firstChild.offsetWidth, firstChild.offsetHeight]
                            ])
                        );
                    }
                    return result;
                }
            }
        );

    var myPlacemark = new ymaps.Placemark([61.675852, 50.763447], {
        address: "Сыктывкар, ул. Автодорожная, 72, стр. 2",
        object: "магазин АВТОЗАПЧАСТИ"
    }, {
        hintLayout: HintLayout
    });

    myMap.geoObjects.add(myPlacemark);
}
