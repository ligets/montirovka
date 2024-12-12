@extends('layouts.app')

@section('content')

<div class="categories-section py-10 bg-gray-100 flex flex-col items-center">
    <h2 class="text-center text-3xl font-semibold">Популярные категории</h2>
    <div class="grid grid-cols-4 gap-6 container mx-auto mt-6" id="category-container">
        @foreach($categories as $index => $category)
            <a href="{{ route('home', ["category_id" => $category->id]) }}" class="category-card h-[80px] bg-white flex items-center justify-center p-4 text-center rounded shadow {{ $index >= 4 ? 'hidden' : '' }}">
                <h3 class="text-lg">{{ $category->name }}</h3>
            </a>
        @endforeach
    </div>
    @if(count($categories) > 4)
        <button id="show-more" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Показать все</button>
    @endif
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
<footer>
    <x-footer/>
</footer>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const showMoreButton = document.getElementById("show-more");
        const hiddenCategories = document.querySelectorAll("#category-container .hidden");

        if (showMoreButton) {
            showMoreButton.addEventListener("click", () => {
                hiddenCategories.forEach(category => category.classList.remove("hidden"));
                showMoreButton.style.display = "none"; // Скрыть кнопку после показа всех категорий
            });
        }
    });
</script>
@endsection
