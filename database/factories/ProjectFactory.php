<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->sentence(5),
            'user_id'=>User::inRandomOrder()->first() ,
            'client_id'=>Client::inRandomOrder()->first()
        ];
    }
}
