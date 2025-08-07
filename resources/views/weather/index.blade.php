@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Weather in {{ $data['location']['name'] }}, {{ $data['location']['country'] }}</h2>
    <form method="GET" action="{{ route('weather.index') }}" class="mb-4">
        <div class="input-group">
            <select name="location" class="form-select">
                <option value="">Select a city</option>
                @foreach ($egyptCities as $city)
                    <option value="{{ $city }}" {{ request('location') == $city ? 'selected' : '' }}>
                        {{ $city }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Get Weather</button>
        </div>
    </form>
    <div class="row">
        <!-- Current Weather Card -->
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h4 class="card-title">Current Weather</h4>
                    <img src="{{ $data['current']['weather_icons'][0] }}" alt="weather icon" class="img-fluid" style="width: 100px;">
                    <p class="lead">{{ $data['current']['weather_descriptions'][0] }}</p>
                    <p>Temperature: <strong>{{ $data['current']['temperature'] }}°C</strong></p>
                    <p>Feels like: {{ $data['current']['feelslike'] }}°C</p>
                    <p>Humidity: {{ $data['current']['humidity'] }}%</p>
                    <p>Cloud Cover: {{ $data['current']['cloudcover'] }}%</p>
                    <p>UV Index: {{ $data['current']['uv_index'] }}</p>
                </div>
            </div>
        </div>

        <!-- Location & Time Card -->
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Location Info</h4>
                    <p><strong>Name:</strong> {{ $data['location']['name'] }}</p>
                    <p><strong>Region:</strong> {{ $data['location']['region'] }}</p>
                    <p><strong>Timezone:</strong> {{ $data['location']['timezone_id'] }}</p>
                    <p><strong>Local Time:</strong> {{ $data['location']['localtime'] }}</p>
                    <p><strong>Latitude:</strong> {{ $data['location']['lat'] }}</p>
                    <p><strong>Longitude:</strong> {{ $data['location']['lon'] }}</p>
                </div>
            </div>
        </div>

        <!-- Astro Info -->
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Astronomy</h4>
                    <p>🌅 Sunrise: {{ $data['current']['astro']['sunrise'] }}</p>
                    <p>🌇 Sunset: {{ $data['current']['astro']['sunset'] }}</p>
                    <p>🌙 Moonrise: {{ $data['current']['astro']['moonrise'] }}</p>
                    <p>🌘 Moonset: {{ $data['current']['astro']['moonset'] }}</p>
                    <p>🌗 Moon Phase: {{ $data['current']['astro']['moon_phase'] }}</p>
                    <p>🔆 Moon Illumination: {{ $data['current']['astro']['moon_illumination'] }}%</p>
                </div>
            </div>
        </div>

        <!-- Air Quality Info -->
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Air Quality</h4>
                    <p>CO: {{ $data['current']['air_quality']['co'] }}</p>
                    <p>NO₂: {{ $data['current']['air_quality']['no2'] }}</p>
                    <p>O₃: {{ $data['current']['air_quality']['o3'] }}</p>
                    <p>SO₂: {{ $data['current']['air_quality']['so2'] }}</p>
                    <p>PM2.5: {{ $data['current']['air_quality']['pm2_5'] }}</p>
                    <p>PM10: {{ $data['current']['air_quality']['pm10'] }}</p>
                    <p>US EPA Index: {{ $data['current']['air_quality']['us-epa-index'] }}</p>
                    <p>GB DEFRA Index: {{ $data['current']['air_quality']['gb-defra-index'] }}</p>
                </div>
            </div>
        </div>

        <!-- Wind & Pressure -->
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Wind & Pressure</h4>
                    <p>💨 Wind Speed: {{ $data['current']['wind_speed'] }} km/h</p>
                    <p>🧭 Wind Direction: {{ $data['current']['wind_dir'] }} ({{ $data['current']['wind_degree'] }}°)</p>
                    <p>🌡 Pressure: {{ $data['current']['pressure'] }} hPa</p>
                    <p>🌧 Precipitation: {{ $data['current']['precip'] }} mm</p>
                    <p>👀 Visibility: {{ $data['current']['visibility'] }} km</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection