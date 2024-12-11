@extends('layouts.app')

@section('content')
<header>
    <x-header/>
</header>
<div class="about-section py-10 bg-gray-100">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-center">О нас</h1>
        <p class="mt-6 text-lg text-gray-700 leading-relaxed">
            Мы – команда, которая стремится сделать спорт доступным и приятным для каждого. Наша миссия – 
            предложить качественные спортивные товары, которые помогут вам достичь ваших целей.
        </p>
        <img src="/images/about_us.jpg" alt="Наша команда" class="w-full mt-6 rounded shadow">
    </div>
</div>
@endsection
