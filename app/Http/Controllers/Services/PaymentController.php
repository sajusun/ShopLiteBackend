<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\SSLCommerzService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        return view('pages.payment.create');
    }

    public function sslCheckout($product, $customer, $generated_tran_id)
    {
        $sslcommerz = new SSLCommerzService();
//        $valID = uniqid();
        $post_data = [
            'total_amount' => $product['total_amount'],
            'currency' => "BDT",
            'tran_id' => $generated_tran_id,
            'success_url' => route('ssl.success'),
            'fail_url' => route('ssl.fail'),
            'cancel_url' => route('ssl.cancel'),

            'cus_name' => $customer['name'],
            'cus_email' => $customer['email'],
            'cus_phone' => $customer['phone'],
            'cus_add1' => $customer['address'],
            'cus_city' => 'Dhaka',
            'cus_country' => 'Bangladesh',
            'shipping_method' => 'NO',

            'product_name' => 'Demo Product',
            'product_category' => 'Demo Category',
            'product_profile' => 'general',
        ];

        $response = $sslcommerz->initiatePayment($post_data);
        if (isset($response['GatewayPageURL'])) {
            return redirect($response['GatewayPageURL']);
        }
        return back()->with('error', 'Payment initiation failed');
    }

    public function sslSuccess(Request $request)
    {
        // Validate it's actually coming from SSLCommerz
        if (!$request->has('val_id')) {
            abort(400, 'Invalid callback');
        }

        $sslcommerz = new SSLCommerzService();
        $validation = $sslcommerz->validatePayment($request->val_id);

        if ($validation['status'] === 'VALID') {
            $order = Order::where('transaction_id', $request->tran_id)->first();
            if ($order && $request->status === 'VALID') {
                $order->status = 'confirmed';
                $order->save();
            }

            return view('pages.payment.success', ['data' => $validation]);
        }

        return redirect()->route('ssl.fail');
    }

    public function sslFail(Request $request)
    {
        $order = Order::where('transaction_id', $request->tran_id)->first();
        if ($order->status == 'pending') {
            $order->status = 'failed';
            $order->save();
            return "Transaction is Failed";
        } else if ($order->status == 'processing' || $order->status == 'complete') {
            return "Transaction is already Successful";
        }
        return "Transaction is Invalid";
    }

    public function sslCancel(Request $request)
    {
        $order = Order::where('transaction_id', $request->tran_id)->first();

        if ($order->status == 'pending') {
            $order->status = 'canceled';
            $order->save();
            return "Payment Cancelled";

        } else if ($order->status == 'processing' || $order->status == 'complete') {
            return "Transaction is already Successful";
        }
        return "Transaction is Invalid";

    }
}
