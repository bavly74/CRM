<?php
namespace App\Clients ;

use GuzzleHttp\Client;

class Fawry extends Client {
    protected $merchantCode = '1tSa6uxz2nRbgY+b+cZGyA==';
    protected $merchant_secret_key = '259af31fc2f74453b3a55739b21ae9ef';
    // protected $baseUri = 'https://atfawry.fawrystaging.com/fawrypay-api/api/payments/';

    public function pay($merchantRefNum , $customerMobile , $customerEmail , $customerName , $customerProfileId , $paymentExpiry , $language , $itemDescription , $amount) {
        $signature= hash('sha256',
                $this->merchantCode .
                $merchantRefNum .
                $customerProfileId .
                'https://developer.fawrystaging.com' .
                1 .
                1 .
                $amount .
                $this->merchant_secret_key
        );
        $payload =[
            'merchantCode' => $this->merchantCode,
                    'merchantRefNum' => $merchantRefNum,
                    'customerMobile' => $customerMobile,
                    'customerEmail' => $customerEmail,
                    'customerName' => $customerName,
                    'customerProfileId' => $customerProfileId,
                    'paymentExpiry' => $paymentExpiry,
                    'language' => $language,
                    'chargeItems' => [
                        [
                            'itemId' => 1,
                            'description' => $itemDescription,
                            'price' => $amount,
                            'quantity' =>1,
                        ]
                    ],
                    'returnUrl' => 'https://developer.fawrystaging.com',
                    'authCaptureModePayment'=> false,
                    'signature' => $signature,
        ];
        try {
                $response = $this->post('init', ['json' => $payload]);
                $paymentUrl = $response->getBody()->getContents();
                return redirect($paymentUrl);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
