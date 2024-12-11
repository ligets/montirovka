@extends('layouts.app')

@section('content')
<header>
    <x-header/>
</header>

<div class="categories-section py-10 bg-gray-100">
    <h2 class="text-center text-3xl font-semibold">Популярные категории</h2>
    <div class="grid grid-cols-4 gap-6 container mx-auto mt-6">
        @foreach($categories as $category)
            <div class="category-card bg-white p-4 text-center rounded shadow">
                <h3 class="text-lg mt-4">{{ $category->name }}</h3>
            </div>
        @endforeach
    </div>
</div>

<div class="products-section py-10">
    <h2 class="text-center text-3xl font-semibold">Рекомендуемые товары</h2>
    <div class="grid grid-cols-4 gap-6 container mx-auto mt-6">
        @foreach($products as $product)
            <div class="product-card bg-white p-4 rounded shadow">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-32 mx-auto">
                <h3 class="text-lg mt-4">{{ $product->name }}</h3>
                <p class="text-green-500 font-bold">{{ $product->price }} ₽</p>
                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary mt-2">Подробнее</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
