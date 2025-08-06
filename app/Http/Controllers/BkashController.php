<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BkashController extends Controller
{
    public function checkout()
    {
        return view('pages.bkash.checkout');
    }

    public function getToken()
    {
        $url = config('bkash.base_url') . '/tokenized/checkout/token/grant';

        $response = Http::withHeaders([
            'username' => config('bkash.username'),
            'password' => config('bkash.password'),
        ])->post($url, [
            'app_key' => config('bkash.app_key'),
            'app_secret' => config('bkash.app_secret'),
        ]);

        if ($response->ok()) {
            session(['bkash_token' => $response['id_token']]);
            return response()->json(['token' => $response['id_token']]);
        }

        return response()->json(['error' => 'Token generation failed'], 500);
    }

    public function makePayment()
    {
        $token = session('bkash_token');
        $url = config('bkash.base_url') . '/tokenized/checkout/create';

        $response = Http::withToken($token)->withHeaders([
            'Content-Type' => 'application/json',
            'app_key' => config('bkash.app_key'),
        ])->post($url, [
            'mode' => '0011',
            'payerReference' => 'customer01',
            'callbackURL' => url('/bkash/callback'),
            'amount' => '10',
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => 'Inv'.uniqid(),
        ]);

        return response()->json($response->json());
    }
}
