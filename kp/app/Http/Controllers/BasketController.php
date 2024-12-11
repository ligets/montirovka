<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index() {
        $items = Basket::where('user_id', auth()->id())
            ->with("product")->get();
        return view("basket.main", compact('items'));
    }

    public function create(int $product_id) {
        $product = Product::find($product_id);

        if (!$product) {
            return redirect()->route('home')->with('error', 'Товар не найдена.');
        }

        // Проверка наличия книги в корзине для текущего пользователя
        $existingBasketItem = Basket::where('product_id', $product->id)
            ->where('user_id', auth()->id())
            ->first();

        // Если книга уже в корзине, увеличиваем её количество
        if ($existingBasketItem) {
            $existingBasketItem->increment('quantity'); // Используем метод increment для увеличения количества
        } else {
            // Если книги нет в корзине, добавляем её с количеством 1
            Basket::create([
                'product_id' => $product->id,
                'user_id' => auth()->id(),
                'quantity' => 1
            ]);
        }

        // Возвращаем пользователя на главную страницу с сообщением об успешном добавлении
        return redirect()->route('home')->with('success', 'Товар добавлен в корзину.');
    }

    public function destroy(int $id) {
        Basket::findOrFail($id)->delete();
        return redirect()->route("basket");
    }
}
