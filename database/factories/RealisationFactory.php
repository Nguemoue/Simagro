<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RealisationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titre' => $this->faker->word(),
            'contenu' => $this->faker->word(),
            'lieu' => $this->faker->word(),
            'date_realisation' => Carbon::now(),
            'realisateur' => $this->faker->word(),
            'nombre_jour' => $this->faker->randomNumber(),
            'photo' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
