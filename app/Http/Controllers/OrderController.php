<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function index()
    {
        $ordersActive = Order::where('status', '!=', 'Доставлен')->get();
        $ordersDelivery = Order::where('status', 'Доставлен')->get();
        return view('orders', compact('ordersActive', 'ordersDelivery'));
    }
    public function show(Order $order)
    {
        return view('order', compact('order'));
    }
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'address' => $request->address
        ]);
        $products = Cart::instance('cart')->content();
        foreach ($products as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'qty' => $product->qty,
                'price' => $product->price
            ]);
        }
        Cart::instance('cart')->destroy();
       return redirect()->route('order.index');
    }
}
