@extends('layouts.app')

@section('content')
    @include("components.snd-header")
    <div class="bg-gray-100 py-10">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Создать новый товар</h1>

            <!-- Форма создания товара -->
            <div class="bg-white p-8 rounded shadow">
                <form action="/products" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Название товара -->
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Название товара</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Введите название товара"
                            value="{{ old('title') }}"
                            required
                        >
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Описание товара -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Описание товара</label>
                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Введите описание товара"
                        >{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Цена товара -->
                    <div class="mb-6">
                        <label for="price" class="block text-sm font-medium text-gray-700">Цена (₽)</label>
                        <input
                            type="number"
                            name="price"
                            id="price"
                            step="0.01"
                            class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Введите цену товара"
                            value="{{ old('price') }}"
                            required
                        >
                        @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Брэнд товара -->
                    <div class="mb-6">
                        <label for="brand" class="block text-sm font-medium text-gray-700">Брэнд товара</label>
                        <input
                            type="text"
                            name="brand"
                            id="brand"
                            class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Введите брэнд товара"
                            value="{{ old('brand') }}"
                            required
                        >
                        @error('brand')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Категория товара -->
                    <div class="mb-6">
                        <label for="category" class="block text-sm font-medium text-gray-700">Категория</label>
                        <select
                            name="category_id"
                            id="category"
                            class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                            <option value="">Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Изображение товара -->
                    <div class="mb-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Изображение товара</label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                        @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Кнопка отправки -->
                    <div class="text-right">
                        <button
                            type="submit"
                            class="px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600"
                        >
                            Создать товар
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
