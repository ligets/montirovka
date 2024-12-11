<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', "App\Http\Controllers\ProductController@index")->name("home");

Route::get("/about", function () {
    return view('about');
});

Route::get("/where", function () {
    return view('where');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/products/{id}", "App\Http\Controllers\ProductController@show")->name("products.id");
Route::get("/products/{id}/edit", function () {
    return view('catalog.edit');
})->name("products.edit")->middleware(['auth', 'role:admin']);
Route::get("/products/create", function () {
    return view('catalog.create');
})->name("products.create")->middleware(['auth', 'role:admin']);
Route::patch("/product/{id}", "App\Http\Controllers\ProductController@update")->name("products.update")->middleware(['auth', 'role:admin']);
Route::post("/products", "App\Http\Controllers\ProductController@store")->name("products.store")->middleware(['auth', 'role:admin']);
Route::delete("/products/{id}", "App\Http\Controllers\ProductController@destroy")->name("products.destroy")->middleware(['auth', 'role:admin']);

Route::get("/orders", "App\Http\Controllers\OrderController@index")->name("orders")->middleware('auth');
Route::get("/orders/{id}", "App\Http\Controllers\OrderController@index")->name("orders.id")->middleware('auth');
Route::get("/orders/admin", "App\Http\Controllers\OrderController@indexAdmin")->name("orders.admin")->middleware('auth');
Route::post("/orders", "App\Http\Controllers\OrderController@store")->name("order.store")->middleware('auth');
Route::delete("/orders", "App\Http\Controllers\OrderController@destroy")->name("order.destroy")->middleware('auth');
Route::post("/orders/{id}", "App\Http\Controllers\OrderController@confirm")->name("order.confirm")->middleware(['auth', 'role:admin']);

Route::get("/basket", "App\Http\Controllers\BasketController@index")->name('basket')->middleware('auth');
Route::post("/basket/{productId}", "App\Http\Controllers\BasketController@create")->name("basket.create")->middleware("auth");
Route::delete("/basket/{id}", "App\Http\Controllers\BasketController@destroy")->name("basket.destroy")->middleware("auth");


require __DIR__.'/auth.php';
