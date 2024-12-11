<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $request->validate([
            'search' => 'nullable|string',
            'brand' => 'nullable|integer|min:1'
        ]);
        $products = Product::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', "%{$request->search}%")
                    ->orWhereHas('brand', function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request->search}%");
                    });
            })->when($request->brand, function ($query) use ($request) {
                $query->where('brand_id', $request->brand);
            })->get();
        return view('home', compact('products'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'brand' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $brand = Brand::firstOrCreate(
            ['name' => $request->brand], // Условие поиска
        );

        $product_arr = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'brand_id' => $brand->id, // Устанавливаем brand_id
            'category_id' => $request->category_id
        ];

        if ($request->hasFile('img_path')) {
            $filePath = $request->file('img_path')->store('img_paths', 'public');
            $product_arr['img_path'] = $filePath;
        }
        $product = Product::create($product_arr);


        return redirect()->route('products.id', compact('product'))->with('success', 'Продукт успешно создан.');
    }

    public function destroy(int $id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $product->delete();

        // Перенаправляем с сообщением об успешном удалении
        return redirect()->route('products.index')->with('success', 'Продукт успешно удалён.');
    }

    public function update(Request $request, int $id)
    {
        // Валидируем входные данные
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'brand' => 'required|string', // Имя бренда
            'category_id' => 'required|integer|exists:categories,id', // Проверка на существование категории
        ]);

        // Находим продукт по ID
        $product = Product::find($id);

        // Если продукт не найден, возвращаем ошибку
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Продукт не найден.');
        }

        // Найти или создать бренд
        $brand = Brand::firstOrCreate(
            ['name' => $request->brand],
            ['created_at' => now(), 'updated_at' => now()]
        );

        // Обновляем продукт
        $product_arr = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'brand_id' => $brand->id, // Устанавливаем brand_id
            'category_id' => $request->category_id
        ];

        if ($request->hasFile('img_path')) {
            $filePath = $request->file('img_path')->store('img_paths', 'public');
            $product_arr['img_path'] = $filePath;
        }
        $product = Product::update($product_arr);

        // Перенаправляем с сообщением об успехе
        return redirect()->route('products.id', compact('product'))->with('success', 'Продукт успешно обновлен.');
    }

    public function show(int $id) {
        $product = Product::findOrFail($id);
        return view("", compact("product"));
    }
}
