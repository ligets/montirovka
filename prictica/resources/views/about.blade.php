<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
    @vite(['resources/css/about.css', 'resources/css/style.css'])
</head>
<body>
<header>
    <div class="flex header">
        <a href="{{ route("about") }}" class="logo">Mollen</a>
        <div class="nav">
            <a href="{{ route("about") }}">
                О нас
            </a>
            <a href="{{ route("catalog") }}">
                Каталог
            </a>
            <a href="{{ route("where") }}">
                Где нас найти
            </a>
        </div>

        <div class="flex enter">
            <button class="cart-button" onclick="toggleCart()">Корзина</button>
            <a href="{{ route("login") }}" class="btn">
                Вход
            </a>
            <a href="{{ route("register") }}" class="btn">
                Регистрация
            </a>
        </div>

        <div id="cart" class="cart">
            <div class="cart-header">
                <h2>Корзина</h2>
                <button class="cart-close" onclick="toggleCart()">&times;</button>
            </div>
            <ul class="cart-items">
                <li class="cart-item">
                    <img src="https://via.placeholder.com/50" alt="Товар">
                    <div class="cart-item-info">
                        <h4>Товар 1</h4>
                        <p>Цена: 15 000 ₽</p>
                    </div>
                    <button class="cart-item-remove">Удалить</button>
                </li>
                <li class="cart-item">
                    <img src="https://via.placeholder.com/50" alt="Товар">
                    <div class="cart-item-info">
                        <h4>Товар 2</h4>
                        <p>Цена: 12 000 ₽</p>
                    </div>
                    <button class="cart-item-remove">Удалить</button>
                </li>
            </ul>
            <div class="cart-total">Итого: 27 000 ₽</div>
        </div>
    </div>
    <div class="cherta">

    </div>
</header>
<main class="main">
    <div class="flex photo-1">
        <div class="ulik">
            <p class="circle">Наши преимущества</p>
            <ul class="ul-1">
                <li>Быстрая доставка</li>
                <li>Удобная оплата</li>
                <li>Рассрочка 0%</li>
                <li>Лучшие цены</li>
                <li>Гарантия 10 лет</li>
                <li>Возврат и обмен без проблем</li>
                <li>Собственное производство</li>
            </ul>
        </div>
        <img class="photo_about" src="/media/images/199b91c7a5d29028a6e2e25ea9da47cd.jpg" alt="self-1">
    </div>
    <div class="flex photo-1">

        <div id="yandexmap" style="width: 80%; height: 700px;margin-left: 50px; display: flex;"></div>
        <div class="ulik-2">
            <p class="circle">Наши принципы</p>
            <ul class="ul-1">
                <li>Правильная конструкция дивана
                    Продуманная эргономика является признаком качества мебели.
                    Мы заботимся о том, чтобы конструкция моделей диванов соответствовала
                    их функциональному назначению: на диване для сна должно быть комфортно спать,
                    а на диване для отдыха сидя — удобно сидеть.
                </li>
                <li>
                    Качественные комплектующие
                    Все комплектующие, используемые при производстве, отвечают европейскому
                    стандарту безопасности Е1. Мы применяем только современные, прочные,
                    долговечные и экологически чистые материалы.
                    Фурнитура, механизмы трансформации, ткани и кожа закупаются в основном
                    в Европе, а дерево — у российских поставщиков.
                </li>
                <li>Технологичность и качество сборки
                    При производстве широко используются современные технологии,
                    автоматизированная работа оптимально совмещается с высококвалифицированным
                    ручным трудом.
                </li>
                <li>Стиль
                    Предлагая своим клиентам удобную, красивую и современную мебель,
                    мы тщательно следим за тем, чтобы она удовлетворяла самым высоким
                    требованиям, в том числе и эстетическим.
                </li>
            </ul>
        </div>
    </div>

</main>
<footer>


</footer>
</body>
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
</html>
