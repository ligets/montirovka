@extends('layouts.app')

@section('content')
    @include("components.snd-header")
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Заказ #{{ $order->id }}</h1>
        <div class="mb-4">
            <p><strong>Пользователь:</strong> {{ $order->user->email }}</p>
            <p><strong>Дата заказа:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
            <p><strong>Статус:</strong> {{ $order->status->name }}</p>
            <p><strong>Общая сумма:</strong> {{ number_format($order->total_price, 2) }} ₽</p>
        </div>
        <h2 class="text-lg font-semibold mb-3">Список товаров</h2>
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Название</th>
                <th class="border px-4 py-2">Количество</th>
                <th class="border px-4 py-2">Цена</th>
                <th class="border px-4 py-2">Общая стоимость</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $product->title }}</td>
                    <td class="border px-4 py-2">{{ $product->pivot->quantity }}</td>
                    <td class="border px-4 py-2">{{ number_format($product->price, 2) }} ₽</td>
                    <td class="border px-4 py-2">{{ number_format($product->price * $product->pivot->quantity, 2) }} ₽</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(auth()->user()->role->name === 'admin')
            <div class="flex gap-4 mt-4">
                <form action="{{ route('order.confirm', ['id' => $order->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                        Подтвердить заказ
                    </button>
                </form>
                <form action="{{ route('order.destroy', ['id' => $order->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                        Отменить заказ
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection
