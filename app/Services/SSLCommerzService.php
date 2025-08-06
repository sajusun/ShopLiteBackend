<?php

namespace App\Services;


use Illuminate\Support\Facades\Http;

class SSLCommerzService
{
    private $storeId;
    private $storePassword;
    private $sandboxMode;

    public function __construct()
    {
        $this->storeId = env('SSLCOMMERZ_STORE_ID');
        $this->storePassword = env('SSLCOMMERZ_STORE_PASSWORD');
        $this->sandboxMode = env('SSLCOMMERZ_SANDBOX_MODE', true);
    }

    public function initiatePayment(array $postData)
    {
        try {
            $url = $this->sandboxMode
                ? 'https://sandbox.sslcommerz.com/gwprocess/v4/api.php'
                : 'https://securepay.sslcommerz.com/gwprocess/v4/api.php';

            $response = Http::asForm()->post($url, array_merge([
                'store_id' => $this->storeId,
                'store_passwd' => $this->storePassword,
                'tran_id' => uniqid(),
                'currency' => 'BDT',
            ], $postData));

            if ($response->successful()) {
                return $response->json();
            }

            return [
                'status' => 'FAILED',
                'failedreason' => 'API request failed: '.$response->status()
            ];

        } catch (\Exception $e) {
            return [
                'status' => 'FAILED',
                'failedreason' => $e->getMessage()
            ];
        }
    }

    public function validatePayment($valId)
    {
        $url = $this->sandboxMode
            ? 'https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php'
            : 'https://securepay.sslcommerz.com/validator/api/validationserverAPI.php';

        $response = Http::get($url, [
            'val_id' => $valId,
            'store_id' => $this->storeId,
            'store_passwd' => $this->storePassword,
            'format' => 'json'
        ]);

        return $response->json();
    }
}
