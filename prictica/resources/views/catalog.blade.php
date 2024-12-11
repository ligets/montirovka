<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    @vite(['resources/css/about.css', 'resources/css/style.css'])
</head>
<body>
<x-header />

<main class="container">
    <div class="content">
        <!-- Фильтры -->
        <aside class="filters">
            <div class="filter-group">
                <label for="category">Категория</label>
                <select id="category">
                    <option value="all">Все категории</option>
                    <option value="sofas">Диваны прямые</option>
                    <option value="corner-sofas">Диваны угловые</option>
                    <option value="armchairs">Кресла</option>
                    <option value="ottomans">Пуфы</option>
                </select>
                <label for="category">Цвет</label>
                <select id="color">
                    <option value="all">Все цвета</option>
                    <option value="sofas">Цвет2</option>
                </select>
                <label for="category">Все коллекции</label>
                <select id="collection">
                    <option value="all">Коллекция1</option>
                    <option value="sofas">Коллекция2</option>

                </select>
            </div>
            <div class="filter-group">
                <label>Цена</label>
                <div style="display: flex; gap: 10px;">
                    <input type="number" id="price-min" placeholder="От" min="0" step="100" style="flex: 1;">
                    <input type="number" id="price-max" placeholder="До" min="0" step="100" style="flex: 1;">
                </div>
            </div>
            <button class="apply-button">Применить фильтры</button>
        </aside>

        <!-- Товары -->
        <section class="products">
            <div class="product-card">
                <img src="https://via.placeholder.com/250" alt="Название товара">
                <h3>Название товара</h3>
                <p>Описание товара</p>
                <div class="price">15 000 ₽</div>
                <button class="apply-button">В корзину</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250" alt="Название товара">
                <h3>Название товара</h3>
                <p>Описание товара</p>
                <div class="price">12 000 ₽</div>
                <button class="apply-button">В корзину</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250" alt="Название товара">
                <h3>Название товара</h3>
                <p>Описание товара</p>
                <div class="price">12 000 ₽</div>
                <button class="apply-button">В корзину</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250" alt="Название товара">
                <h3>Название товара</h3>
                <p>Описание товара</p>
                <div class="price">12 000 ₽</div>
                <button class="apply-button">В корзину</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250" alt="Название товара">
                <h3>Название товара</h3>
                <p>Описание товара</p>
                <div class="price">10 000 ₽</div>
                <button class="apply-button">В корзину</button>
            </div>
        </section>
    </div>
</main>
<script>
    // Функция для открытия/закрытия корзины
    function toggleCart() {
        const cart = document.getElementById('cart');
        cart.classList.toggle('open');
    }
</script>
<footer>
<x-footer/>
</footer>
</body>
</html>
