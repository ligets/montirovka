<!-- resources/views/orders/index.blade.php -->
@extends('layouts.app')

@section('content')
    @include("components.snd-header")
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Все заказы</h1>
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">ID заказа</th>
                <th class="border px-4 py-2">Пользователь</th>
                <th class="border px-4 py-2">Дата</th>
                <th class="border px-4 py-2">Общая сумма</th>
                <th class="border px-4 py-2">Статус</th>
                <th class="border px-4 py-2">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $order->id }}</td>
                    <td class="border px-4 py-2">{{ $order->user->email }}</td>
                    <td class="border px-4 py-2">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td class="border px-4 py-2">{{ number_format($order->total_price, 2) }} ₽</td>
                    <td class="border px-4 py-2">{{ $order->status->name }}</td>
                    <td class="border px-4 py-2 flex flex-col">
                        <a href="{{ route('orders.id', $order->id) }}"
                           class="text-blue-500 hover:underline">
                            Подробнее
                        </a>
                        <form action="{{ route('order.confirm', ['id' => $order->id]) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="text-green-500 hover:underline">
                                Подтвердить
                            </button>
                        </form>
                        <form action="{{ route('order.destroy', ['id' => $order->id]) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">
                                Отменить
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-4">Нет заказов</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
