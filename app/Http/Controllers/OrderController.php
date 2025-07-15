<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // List all orders of logged-in user
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->orderByDesc('created_at')->get();
        return view('orders.index', compact('orders'));
    }

    // Show order details
    public function show(Order $order)
    {
        // prevent accessing others' orders
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product');
        return view('orders.show', compact('order'));
    }
}
