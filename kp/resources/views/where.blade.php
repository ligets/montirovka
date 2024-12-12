@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-10">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Где нас найти</h1>

            <!-- Карта -->
            <div class="map-container mb-8">
                <iframe
                    class="w-full h-96 rounded shadow"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.835434509374!2d144.95373631531177!3d-37.816279742017675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577a71c8d728b67!2sSport%20Store!5e0!3m2!1sen!2sru!4v1697050959342!5m2!1sen!2sru"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Контактная информация -->
            <div class="bg-white p-6 rounded shadow mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Наш адрес:</h2>
                <p class="text-gray-600">г. Москва, ул. Спортивная, д. 10, офис 5</p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6 mb-4">Контакты:</h2>
                <p class="text-gray-600">
                    <strong>Телефон:</strong> <a href="tel:+74951234567" class="text-blue-500 hover:underline">+7 (495) 123-45-67</a>
                </p>
                <p class="text-gray-600">
                    <strong>Email:</strong> <a href="mailto:info@sportstore.ru" class="text-blue-500 hover:underline">info@sportstore.ru</a>
                </p>
            </div>

            <!-- Часы работы -->
            <div class="bg-white p-6 rounded shadow mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Часы работы:</h2>
                <ul class="list-disc list-inside text-gray-600">
                    <li>Понедельник - Пятница: 9:00 - 20:00</li>
                    <li>Суббота: 10:00 - 18:00</li>
                    <li>Воскресенье: выходной</li>
                </ul>
            </div>

            <!-- Социальные сети -->
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Мы в социальных сетях:</h2>
                <div class="flex space-x-4">
                    <a href="https://vk.com/sportstore" class="text-gray-600 hover:text-blue-500" target="_blank">
                        <i class="fab fa-vk"></i> ВКонтакте
                    </a>
                    <a href="https://www.instagram.com/sportstore" class="text-gray-600 hover:text-pink-500" target="_blank">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                    <a href="https://www.facebook.com/sportstore" class="text-gray-600 hover:text-blue-700" target="_blank">
                        <i class="fab fa-facebook"></i> Facebook
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
