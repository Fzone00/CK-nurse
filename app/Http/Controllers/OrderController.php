<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order_items = OrderItem::orderBy('id', 'ASC')->paginate(10);
        return view('orders.show', compact('order_items'));
    }
    public function store(OrderStoreRequest $request)
    {
        $order = Order::create([
            'user_id' => $request->user()->id,
        ]);

        $cart = $request->user()->cart()->get();
        foreach ($cart as $item) {
            $order->items()->create([
                'price' => $item->price,
                'quantity' => $item->pivot->quantity,
                'product_id' => $item->id,
            ]);
            $item->quantity = $item->quantity - $item->pivot->quantity;
            $item->save();
        }
        $request->user()->cart()->detach();
        return 'success';
    }

    public function show($id)
    {
        $order_items = OrderItem::orderBy('id', 'ASC')->paginate(10);
        return view('orders.show', compact('order_items'));
    }

    public function destroy(OrderItem $order)
    {
        $order->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
