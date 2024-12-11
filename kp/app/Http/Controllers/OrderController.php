<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', auth()->id())->orderBy('updated_at', 'desc')->get();
        return view("", compact('orders'));
    }

    public function store(Request $request) {
        $request->validate([
            'type' => 'required|string',
            'book_id' => 'integer|min:0',
            'quantity' => 'integer|min:0'
        ]);
        if ($request->type == 'basket') {
            $basketSummary = Product::where('user_id', auth()->id())
                ->with('book')
                ->get()
                ->map(function ($basket) {
                    return [
                        'book_id' => $basket->book_id,
                        'quantity' => $basket->quantity,
                        'total_price' => $basket->quantity * $basket->book->price,
                    ];
                });
            $totalPrice = $basketSummary->sum('total_price');
            $order = Order::create([
                'total_price' => $totalPrice,
                'user_id' => auth()->id(),
                'status_id' => Status::where('name', 'Ожидает подтверждения')->first()->id
            ]);
            foreach ($basketSummary as $item) {
                $order->books()->attach([
                    $item['book_id'] => ['quantity' => $item['quantity']]
                ]);
            }
            Product::where("user_id", auth()->id())->delete();
        }
        else if ($request['type'] == 'product') {
            $product = Product::findOrFail($request->product_id);
            $order = Order::create([
                'total_price' => $product->price * $request->quantity,
                'user_id' => auth()->id(),
                'status_id' => Status::where('name', 'Ожидает подтверждения')->first()->id
            ]);
            $order->books()->attach($product->id, ['quantity' => $request->quantity]);
        }
        else {
            abort(400);
        }
        return redirect()->route('profile.orders');
    }

    public function show(int $id) {
        $order = Order::with("books")->findOrFail($id);
        if ($order->user_id != auth()->id() && auth()->user()->role->name != 'admin') {
            abort(403);
        }
        return view("", compact('order'));
    }

    public function destroy(int $id) {
        $order = Order::findOrFail($id);
        if ($order->user_id != auth()->id() && auth()->user()->role->name != 'admin') {
            abort(403);
        }
        if ($order->status->name != 'Ожидает подтверждения') {
            abort(400);
        }
        $order->status_id = Status::where("name", "Отменен")->first()->id;
        $order->save();
        return redirect(url()->previous());
    }

    public function confirm(int $order_id) {
        $order = Order::findOrFail($order_id);
        $order->status_id = Status::where('name', 'Подтвержден')->first()->id;
        $order->save();
        return redirect(url()->previous());
    }
}
