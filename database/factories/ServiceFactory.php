<?php

namespace Database\Factories;

use App\Models\Administrateur;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->word(),
            'description' => $this->faker->text(),
            'but' => $this->faker->word(),
            'administrateur_id' => Administrateur::factory(),
            'created_at' => Carbon::now(),
            'image'=>fake()->imageUrl(1000,2000),
            'updated_at' => Carbon::now(),
        ];
    }
}
