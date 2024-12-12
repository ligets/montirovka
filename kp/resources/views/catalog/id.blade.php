@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Изображение товара -->
            <div class="md:w-1/3">
                <img src="{{ $product->image_url ?? asset('images/placeholder.png') }}" alt="{{ $product->title }}" class="w-full rounded-lg shadow-md">
            </div>

            <!-- Информация о товаре -->
            <div class="md:w-2/3">
                <h1 class="text-2xl font-bold text-gray-800">{{ $product->title }}</h1>

                <div class="mt-2 text-gray-600">
                    <span class="font-semibold">Бренд:</span> {{ $product->brand->name ?? 'Не указан' }}<br>
                    <span class="font-semibold">Категория:</span> {{ $product->category->name ?? 'Не указана' }}
                </div>

                <div class="mt-4 text-lg text-gray-800 font-semibold">
                    Цена: {{ number_format($product->price, 2, '.', ' ') }} ₽
                </div>

                <p class="mt-4 text-gray-700">{{ $product->description }}</p>

                <!-- Кнопка добавления в корзину -->
                <form action="{{ route('basket.create', $product->id) }}" method="POST" class="mt-6">
                    @csrf
                    <div class="flex items-center gap-4">
                        <input type="number" name="quantity" min="1" value="1" class="w-16 border border-gray-300 rounded-lg text-center focus:outline-none focus:ring focus:ring-blue-200">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none">
                            Добавить в корзину
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
