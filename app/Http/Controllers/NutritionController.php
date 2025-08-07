<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NutritionController extends Controller
{
    public function index() {
        $client = new Client() ;
        $response = $client->get('https://api.edamam.com/api/nutrition-data', [
            'query' => [
                'app_id' => config('services.nutrition.app_id'),
                'app_key' => config('services.nutrition.app_key'),
                'nutrition-type' => 'cooking',
                'ingr' => '1 cup rice, 10 oz chickpeas',
            ]
        ]);        
        $data = json_decode($response->getBody(), true);
        return $data ;
    }
}
