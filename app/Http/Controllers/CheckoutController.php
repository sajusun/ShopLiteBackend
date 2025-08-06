<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\PaymentController;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Show Checkout Page
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }
        return view('checkout.index', compact('cart'));
    }

    // Place Order
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:1000',
        ]);
        $paymentController = new PaymentController();
        $valID = uniqid();
        $cart = session()->get('cart', []);
        $flatShippingCost = config('app.order_flat_shipping', 60);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Optional: free shipping for high value orders
        if ($total > 5000) {
            $flatShippingCost = 0;
        }

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => auth()->id(),
                'shipping_cost' => $flatShippingCost,
                'amount' => $total + $flatShippingCost,
                'status' => 'pending',
                'transaction_id' => $valID,
                'payment_method' => $request->payment_method,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
            DB::commit();
            session()->forget('cart');
            $product = [
                'total_amount' => $total + $flatShippingCost,
                'name' => 'demo product',
                'category' => 'demo product',
                'profile' => 'general',
            ];
            $customer = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ];

//            return redirect()->route('home')->with('success', 'Order placed successfully!');
            return $paymentController->sslCheckout($product, $customer,$valID);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

}
