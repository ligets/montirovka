<footer class="bg-[#007aff] text-white py-8">
    <div class="container mx-auto px-6 lg:px-20 flex flex-col lg:flex-row justify-between">
        <!-- About Us -->
        <div class="mb-6 lg:mb-0">
            <h4 class="text-lg font-bold text-white mb-2">SportShop</h4>
            <p class="text-white">
                Мы специализируемся на предоставлении качественного<br> оборудования и аксессуаров для всех видов спорта.
            </p>
        </div>

        <!-- Navigation Links -->
        <div class="mb-6 lg:mb-0">
            <h4 class="text-lg font-bold text-white mb-2">Навигация</h4>
            <ul>
                <li><a href="{{ route('home') }}" class="hover:text-yellow-300">Главная</a></li>
                <li><a href="/about" class="hover:text-yellow-300">О нас</a></li>
                <li><a href="/where" class="hover:text-yellow-300">Где мы</a></li>
                <li><a href="{{ route('basket') }}" class="hover:text-yellow-300">Корзина</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div>
            <h4 class="text-lg font-bold text-white mb-2">Контакты</h4>
            <p class="text-white">Email: support@SportShop.com</p>
            <p class="text-white">Телефон: +7 (800) 555-35-35</p>
            <p class="text-white">Адрес: Москва, ул. Книжная, д. 42</p>
        </div>
    </div>
    <div class="mt-8 text-center text-white">
        &copy; 2024 SportShop. Все права защищены.
    </div>
</footer>
