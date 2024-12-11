<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    @vite(['resources/css/about.css', 'resources/css/style.css'])
</head>
<body>
<x-header/>
<main class="flex">
    <div id="yandexmap" style="width: 40%; height: 700px; margin-left: 50px; display: flex;"></div>
    <div class="info_cont">
        <div>
            <h2 class="address">Адрес</h2>
            <span>Город Ижевск, улица 10 лет Октября, 32</span>
        </div>
        <div>
            <h2 class="address">Контакты для связи</h2>
            <span>Email: example@domain.com</span>
            <span>Telegram: @example</span>
            <span>Номер телефона: +7 (999) 999-99-99</span>
        </div>
    </div>
</main>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>
    let map;

    function initMap() {
        map = new ymaps.Map("yandexmap", {
            center: [56.871633, 53.227287],
            zoom: 16
        });
        const marker = new ymaps.Placemark(
            [56.871633, 53.227287], // Координаты маркера
            {
                hintContent: 'Центральная точка', // Подсказка при наведении
                balloonContent: 'Это точка, на которую карта отцентрирована' // Содержимое балуна
            }
        );

        // Добавление маркера на карту
        map.geoObjects.add(marker);
        window.addEventListener("resize", () => {
            map.container.fitToViewport();
        });
    }

    ymaps.ready(initMap);
</script>
<script>
    // Функция для открытия/закрытия корзины
    function toggleCart() {
        const cart = document.getElementById('cart');
        cart.classList.toggle('open');
    }
</script>
</body>
</html>
