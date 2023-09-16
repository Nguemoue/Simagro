<?php

namespace Database\Factories;

use App\Models\Administrateur;
use App\Models\DomainePublication;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PublicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'administrateur_id' => Administrateur::query()->pluck("id")->random(),
            'domaine_publication_id' => DomainePublication::factory(),
            'contenu' => $this->faker->word(),
            'titre' => $this->faker->word(),
            'date_publication' => Carbon::now(),
            'statut' => $this->faker->randomElement([1,0]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
