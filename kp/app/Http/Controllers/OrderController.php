<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', auth()->id())->orderBy('updated_at', 'desc')->get();
        return view("order.main", compact('orders'));
    }

    public function store(Request $request) {
        $request->validate([
            'type' => 'required|string',
            'book_id' => 'integer|min:0',
            'quantity' => 'integer|min:0'
        ]);
        if ($request->type == 'basket') {
            $basketSummary = Basket::where('user_id', auth()->id())
                ->with('product')
                ->get()
                ->map(function ($basket) {
                    return [
                        'product_id' => $basket->product->id,
                        'quantity' => $basket->quantity,
                        'total_price' => $basket->quantity * $basket->product->price,
                    ];
                });
            $totalPrice = $basketSummary->sum('total_price');
            $order = Order::create([
                'total_price' => $totalPrice,
                'user_id' => auth()->id(),
                'status_id' => Status::where('name', 'Ожидает подтверждения')->first()->id
            ]);
            foreach ($basketSummary as $item) {
                $order->products()->attach([
                    $item['product_id'] => ['quantity' => $item['quantity']]
                ]);
            }
            Basket::where("user_id", auth()->id())->delete();
        }
        else if ($request->type == 'product') {
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
        return redirect()->route('orders');
    }

    public function show(int $id) {
        $order = Order::with("books")->findOrFail($id);
        if ($order->user_id != auth()->id() && auth()->user()->role->name != 'admin') {
            abort(403);
        }
        return view("order.id", compact('order'));
    }

    public function indexAdmin() {
        $orders = Order::where("status_id", Status::where('name', 'Ожидает подтверждения')->first()->id)->get();
        return view("order.admin", compact('orders'));
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
