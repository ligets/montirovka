{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <x-header/>--}}
{{--    <div class="bg-gray-100 py-10">--}}
{{--        <div class="container mx-auto px-4">--}}
{{--            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Корзина</h1>--}}

{{--            <!-- Проверка на наличие товаров в корзине -->--}}
{{--            @if($items->isEmpty())--}}
{{--                <div class="bg-white p-6 rounded shadow text-center">--}}
{{--                    <p class="text-lg text-gray-600">Ваша корзина пуста.</p>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <!-- Список товаров в корзине -->--}}
{{--                <div class="bg-white rounded shadow mb-8">--}}
{{--                    <table class="min-w-full table-auto">--}}
{{--                        <thead class="bg-gray-200">--}}
{{--                        <tr>--}}
{{--                            <th class="px-6 py-3 text-left text-gray-600">Товар</th>--}}
{{--                            <th class="px-6 py-3 text-left text-gray-600">Количество</th>--}}
{{--                            <th class="px-6 py-3 text-left text-gray-600">Цена</th>--}}
{{--                            <th class="px-6 py-3 text-left text-gray-600">Сумма</th>--}}
{{--                            <th class="px-6 py-3 text-left text-gray-600">Действия</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($items as $item)--}}
{{--                            <tr>--}}
{{--                                <td class="px-6 py-4">{{ $item->name }}</td>--}}
{{--                                <td class="px-6 py-4">--}}
{{--                                    <input--}}
{{--                                        type="number"--}}
{{--                                        value="{{ $item->quantity }}"--}}
{{--                                        min="1"--}}
{{--                                        class="w-16 px-2 py-1 border rounded text-center"--}}
{{--                                        data-item-id="{{ $item->id }}"--}}
{{--                                        data-action="update-quantity"--}}
{{--                                    />--}}
{{--                                </td>--}}
{{--                                <td class="px-6 py-4">{{ number_format($item->price, 2, ',', ' ') }} ₽</td>--}}
{{--                                <td class="px-6 py-4">{{ number_format($item->price * $item->quantity, 2, ',', ' ') }} ₽</td>--}}
{{--                                <td class="px-6 py-4">--}}
{{--                                    <form method="POST" action="{{ route('cart.remove', $item->id) }}">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button type="submit" class="text-red-500 hover:text-red-700">Удалить</button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}

{{--                <!-- Итоговая сумма -->--}}
{{--                <div class="bg-white p-6 rounded shadow mb-8">--}}
{{--                    <div class="flex justify-between text-lg font-semibold text-gray-800">--}}
{{--                        <span>Итого:</span>--}}
{{--                        <span>{{ number_format($totalPrice, 2, ',', ' ') }} ₽</span>--}}
{{--                    </div>--}}
{{--                    <div class="mt-4 text-right">--}}
{{--                        <a href="{{ route('checkout') }}" class="px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600">Оформить заказ</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-10">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Корзина</h1>

            <!-- Проверка на наличие товаров в корзине -->
            @if(count($items) > 0)
                <!-- Список товаров -->
                <div class="bg-white p-6 rounded shadow">
                    <table class="w-full border-collapse">
                        <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4 text-gray-600">Товар</th>
                            <th class="text-left py-3 px-4 text-gray-600">Цена</th>
                            <th class="text-left py-3 px-4 text-gray-600">Количество</th>
                            <th class="text-left py-3 px-4 text-gray-600">Итого</th>
                            <th class="py-3 px-4"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="border-b">
                                <td class="py-3 px-4 text-gray-800">{{ $item->name }}</td>
                                <td class="py-3 px-4 text-gray-800">{{ number_format($item->price, 2) }} ₽</td>
                                <td class="py-3 px-4">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                               class="w-16 border rounded px-2 py-1 text-gray-800">
                                        <button type="submit" class="ml-2 text-blue-500 hover:underline">Обновить</button>
                                    </form>
                                </td>
                                <td class="py-3 px-4 text-gray-800">{{ number_format($item->price * $item->quantity, 2) }} ₽</td>
                                <td class="py-3 px-4">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Итоги -->
                <div class="mt-6 bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Итого:</h2>
                    <div class="flex justify-between items-center">
                        <p class="text-gray-800 text-lg">Общая сумма:</p>
                        <p class="text-gray-800 text-lg font-bold">{{ number_format($cartTotal, 2) }} ₽</p>
                    </div>
                    <div class="mt-4 text-right">
                        <a href="{{ route('orders.store') }}" class="px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Оформить заказ
                        </a>
                    </div>
                </div>
            @else
                <!-- Пустая корзина -->
                <div class="bg-white p-6 rounded shadow text-center">
                    <p class="text-gray-800 text-lg">Ваша корзина пуста.</p>
                    <a href="{{ route('home') }}" class="mt-4 inline-block px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Перейти к покупкам
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
