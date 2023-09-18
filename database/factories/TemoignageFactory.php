<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TemoignageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'contenu' => fake()->randomHtml(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'client_id' => Client::exists()?Client::pluck("id")->random():Client::factory(),
        ];
    }
}
