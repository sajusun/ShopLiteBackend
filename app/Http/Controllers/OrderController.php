<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
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

    public function cancel(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return redirect()->back()->with('error', 'Order cannot be cancelled at this stage.');
        }
        // Restore stock for each item
//        foreach ($order->items as $item) {
//            $item->product->increment('stock', $item->quantity);
//        }

        $order->update([
            'status' => 'canceled',
        ]);

        return redirect()->route('my.orders.index', $order->id)->with('success', 'Order cancelled successfully.');
    }

}
