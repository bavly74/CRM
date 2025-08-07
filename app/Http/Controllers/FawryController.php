<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class FawryController extends Controller
{
    public function index(){
        // This method can be used to display a view or handle Fawry payment logic
        $merchantCode = '1tSa6uxz2nTwlaAmt38enA==';
        $merchantRefNum = \Str::random(4) . '-' . time() ; // Unique reference number for the transaction
        $customerProfileId = '777777';
        $paymentMethod = 'PayUsingCC';  //choose payment method, can be 'PayAtFawry' or PAYATFAWRY, CASHONDELIVERY, PayUsingCC, MWALLET
        $amount = '580.55';
        $cardNumber = '4242424242424242';
        $cardExpiryYear = '28';
        $cardExpiryMonth = '12';
        $cvv = '123';
        $returnUrl = "https://developer.fawrystaging.com";
        $merchant_sec_key = '259af31fc2f74453b3a55739b21ae9ef';

        $signature = hash('sha256',
            $merchantCode .
            $merchantRefNum .
            $customerProfileId .
            $paymentMethod .
            $amount .
            $cardNumber .
            $cardExpiryYear .
            $cardExpiryMonth .
            $cvv .
            $returnUrl .
            $merchant_sec_key
        );

        //Signature Using Card 
        // $signature = hash('sha256' , 
        //     $merchantCode .
        //     $merchantRefNum .
        //     $customerProfileId .
        //     $paymentMethod .
        //     $amount .
        //     $cardNumber .
        //     $cardExpiryYear .
        //     $cardExpiryMonth .
        //     $cvv .
        //     $returnUrl .
        //     $merchant_sec_key
        // );

        //Signature Using Fawry Ref Number 
        // $signature = hash('sha256' , $merchantCode . $merchantRefNum . $customerProfileId . $paymentMethod . $amount . $merchant_sec_key);

        $client = new Client();
        try{
            
            
                $response = $client->post('https://atfawry.fawrystaging.com/fawrypay-api/api/payments/init', [
                            'json' => [
                                // Using Card 
                                // 'merchantCode' => $merchantCode,
                                // 'merchantRefNum' => $merchantRefNum,
                                // 'customerMobile' => '01234567891',
                                // 'customerEmail' => 'example@gmail.com',
                                // 'customerProfileId' =>  $customerProfileId,
                                // 'cardNumber' => $cardNumber,
                                // 'cardExpiryYear' => '28',
                                // 'cardExpiryMonth' => '12',
                                // 'cvv' => '123',
                                // 'amount' => $amount,
                                // 'currencyCode' => 'EGP',
                                // 'language' => 'en-gb',
                                // 'chargeItems' => [
                                //     [
                                //         'itemId' => '897fa8e81be26df25db592e81c31c',
                                //         'description' => 'Item Description',
                                //         'price' => '580.55',
                                //         'quantity' => '1'
                                //     ]
                                // ],
                                // 'enable3DS' => true,
                                // 'authCaptureModePayment' => false,
                                // 'returnUrl' => $returnUrl,
                                // 'signature' => $signature,
                                // 'paymentMethod' =>  $paymentMethod ,
                                // 'description' => 'example description'


                                'merchantCode' => $merchantCode,
                                'merchantRefNum' => $merchantRefNum,
                                'customerName' => 'Ahmed Ali',
                                'customerMobile' => '01234567891',
                                'customerEmail' => 'example@gmail.com',
                                'customerProfileId'=> '777777',
                                'amount' => '580.55',
                                'paymentExpiry' => 1631138400000,
                                'currencyCode' => 'EGP',
                                'language' => 'en-gb',
                                'chargeItems' => [
                                                    [
                                                    'itemId' => '897fa8e81be26df25db592e81c31c',
                                                    'description' => 'Item Description',
                                                    'price' => '580.55',
                                                    'quantity' => '1'
                                                    ]
                                                ],
                                'signature' =>$signature,
                                'returnUrl'=> 'https://developer.fawrystaging.com',
                                'language' => "en-gb",
                                'paymentMethod' => $paymentMethod,
                                'description' => 'example description',
                                'authCaptureModePayment'=> false,
                            ]
                        ]);

                        $data = json_decode($response->getBody(), true);
                        return $data;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'response' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : null
            ];
        }
    }


    public function initFawryPayment()
    {
        $customerEmail = 'customer@example.com';
        $customerMobile = '01234567891';
        $amount = '100.00'; // المبلغ الإجمالي
        $itemId = 'ITEM001';
        $itemDescription = 'Test item';
        $quantity = 1;
        $paymentExpiry= '1631138400000'; 
        $language = "en-gb";
        $returnUrl = 'https://developer.fawrystaging.com'; // رابط العودة بعد الدفع
        $merchantCode = '1tSa6uxz2nRbgY+b+cZGyA==';
        $merchantRefNum = strtoupper(\Str::random(4)) . '-' . time();
        $customerProfileId = 'CUSTs1001';
        $paymentMethod = ''; // فارغ
        $merchant_secret_key = '259af31fc2f74453b3a55739b21ae9ef';


        //  "merchantCode +
        //   merchantRefNum 
        //   + customerProfileId (if exists, otherwise insert "")
        //    + returnUrl +
        //     itemId +
        //      quantity +
        //       Price (in tow decimal format like ‘10.00’)
        //        + Secure hash key

        $signature = hash('sha256',
            $merchantCode .
            $merchantRefNum .
            $customerProfileId .
            $returnUrl .
            1 .
            1 .
            $amount .
            $merchant_secret_key
        );

        $client = new Client();
        try {
            $response = $client->post('https://atfawry.fawrystaging.com/fawrypay-api/api/payments/init', [
                'json' => [
                    'merchantCode' => $merchantCode,
                    'merchantRefNum' => $merchantRefNum,
                    'customerMobile' => $customerMobile,
                    'customerEmail' => $customerEmail,
                    'customerName' => "Bavly",
                    'customerProfileId' => $customerProfileId,
                    'paymentExpiry' => $paymentExpiry,
                    'language' => $language,
                                        'chargeItems' => [
                        [
                            'itemId' => $itemId,
                            'description' => $itemDescription,
                            'price' => $amount,
                            'quantity' => $quantity,
                        ]
                    ],
                    'returnUrl' => 'https://developer.fawrystaging.com',
                    'authCaptureModePayment'=> false,
                    'signature' => $signature,
                    

                ]
            ]);

            $data = json_decode($response->getBody(), true);
            return response()->json($data);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
        
}
