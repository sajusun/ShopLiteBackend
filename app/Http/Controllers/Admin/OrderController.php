<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Order deleted!');
    }
}
