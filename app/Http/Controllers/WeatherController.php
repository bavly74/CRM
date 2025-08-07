<?php

namespace App\Http\Controllers;
use App\Clients\WeatherConfig;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index(WeatherConfig $client , Request $request) {
            $egyptCities = [
        'Cairo', 'Alexandria', 'Giza', 'Shubra El-Kheima', 'Port Said', 'Suez',
        'Luxor', 'Aswan', 'Tanta', 'Mansoura', 'Zagazig', 'Ismailia', 'Faiyum',
        'Assiut', 'Damietta', 'Damanhur', 'Beni Suef', 'Hurghada', 'Qena', 'Sohag'
        ];
        $location = $request->input('location', 'Cairo') ?: 'Cairo';
        $response = $client->get('current?access_key='.config('services.weather.api_key').'&query='.$location);
        $body = json_decode($response->getBody(), true);
        return view( 'weather.index', [
            'data' => $body,
            'egyptCities' => $egyptCities,
        ]) ;
    }
}
