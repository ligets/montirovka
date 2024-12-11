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
