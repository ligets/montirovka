<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">
<header class="flex items-center justify-between px-6 py-4 bg-[#007aff] text-white shadow-lg">
    <!-- Logo Section -->
    <div class="flex items-center gap-4">
        <a href="/" class="text-2xl font-bold hover:text-yellow-300 transition">
            SportShop
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="hidden lg:flex gap-6 text-lg">
        <a href="{{ route('home') }}" class="hover:text-yellow-300 transition">Главная</a>
        <a href="/about" class="hover:text-yellow-300 transition">О нас</a>
        <a href="/where" class="hover:text-yellow-300 transition">Где мы</a>
    </nav>

    <!-- Action Buttons -->
    <div class="flex items-center gap-4">
        @auth
            <div class="sm:flex sm:items-center sm:ms-6">
                <a href="{{ route('basket') }}" class="px-4 py-2 text-white transition">Корзина</a>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Профиль') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                                                this.closest('form').submit();">
                                {{ __('Выйти') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @endauth
        @guest
            <a
                href="{{ route('login') }}"
                class="rounded-md px-3 py-2 bg-blue-500 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Вход
            </a>


            <a
                href="{{ route('register') }}"
                class="rounded-md bg-blue-500s px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Регистрация
            </a>
        @endguest
    </div>

    <!-- Mobile Menu -->
    <button class="lg:hidden px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-lg text-white" id="menuButton">
        ☰
    </button>
</header>

<!-- Search Bar -->
<form method="GET" action="{{ route('home') }}" class="flex items-center justify-center w-full h-12 bg-[#007aff]">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="СПОРТ - ЭТО ЖИЗНЬ!!!"
           class="w-3/4 h-full mb-[8px] px-4 rounded-l-lg text-gray-800 outline-none border-none">
    <button type="submit" class="mb-[8px] h-full px-4 bg-white text-blue-500 rounded-r-lg">
        🔍
    </button>
</form>

<script>
    const menuButton = document.getElementById('menuButton');
    menuButton.addEventListener('click', () => {
        const nav = document.querySelector('nav');
        nav.classList.toggle('hidden');
    });
</script>
</body>
</html>
