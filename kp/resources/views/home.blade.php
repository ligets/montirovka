@extends('layouts.app')

@section('content')
<header>
    <x-header/>
</header>

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
    <div class="grid grid-cols-4 gap-4 container mx-auto mt-6">
        @foreach($products as $product)
            <a href="{{ route('products.id', ['id' => $product->id]) }}" class="w-[350px] mx-auto bg-white border border-gray-200 rounded-lg shadow-md flex flex-col overflow-hidden">
                <img class="w-auto h-48 object-cover" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $product->title }}</h3>
                    <p class="mt-2 text-sm text-gray-600">{{ $product->description }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xl font-bold text-gray-900">₽{{ number_format($product->price, 2) }}</span>
                        <form action="{{ route('basket.create', $product->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="!bg-blue-500 text-white px-4 py-2 rounded mt-2">
                                В корзину
                            </button>
                        </form>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
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
