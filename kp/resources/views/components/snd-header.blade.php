<div class="flex justify-center gap-5 mt-4 text-sm md:text-base">
    <a href="{{ route('profile.edit') }}"
       class="{{ Route::currentRouteName() === 'profile.edit' ? 'border-b-2 border-blue-500' : '' }}">
        Профиль
    </a>

    @if (auth()->user()->role->name == 'admin')
        <a href="{{ route('products.create') }}"
           class="{{ Route::currentRouteName() === 'products.create' ? 'border-b-2 border-blue-500' : '' }}">
            Добавление товара
        </a>
        <a href="{{ route('orders.admin') }}"
           class="{{ Route::currentRouteName() === 'orders.admin' ? 'border-b-2 border-blue-500' : '' }}">
            Заказы
        </a>
    @else
        <a href="{{ route('orders') }}"
           class="{{ Route::currentRouteName() === 'orders' ? 'border-b-2 border-blue-500' : '' }}">
            Мои заказы
        </a>
    @endif
</div>
<div class="border-b border-gray-300 mt-5"></div>
