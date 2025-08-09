<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class payPalController extends Controller
{
    public function index() {
        $client = new Client() ;
        $response = $client->get('https://api-m.sandbox.paypal.com/v1/invoicing/invoices',[
            'headers'=>[
             "Content-Type"=> "application/json" ,
             "Authorization"=>"Bearer ".$this->getAccessToken()
            ]
            ]);

          return  $body = json_decode($response->getBody() , true);
    }

    public function getAccessToken() {

        $client = new Client() ;
        $response = $client->post('https://api-m.sandbox.paypal.com/v1/oauth2/token',[
            'auth'=>['ARSF-DGkKaZxTvVvkbSP-RqTpD5Oimx8onwdNLR-2pRIYSbwtNLYlnsXRvLaeUCafge0Kpkz6-aPFuaz','ELYw7n_Vks5E3Vlyh0h6sJEaldewnP7x3SWL91OaPdu1LpV5L7DLK3nLg_rHCT3bRxz2TYW1BdAuLZi2'],
            'form_params' => [
                'grant_type' => 'client_credentials', // same as -d
            ],
            'headers' => [
    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
        ]) ;

         $body =json_decode( $response->getBody(),true);
        return $body['access_token'];
//
    }
}
