<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AdministrateurFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(
                [config('misc.type_admin.simple'),config('misc.type_admin.super')]
            ),
            'nom' => $this->faker->firstName(),
            'prenom' => $this->faker->lastName(),
            'bp' => $this->faker->postcode(),
            'ville' => $this->faker->city(),
            'pays' => $this->faker->country(),
            'type_compte' => $this->faker->randomElement(
                [config('misc.type_account.entreprise'),config('misc.type_account.particulier')]
            ),
            'telephone' => $this->faker->phoneNumber(),
            'password' => bcrypt("password"),
            'photo' => $this->faker->imageUrl(1024,800),
            'email' => $this->faker->unique()->freeEmail(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            "email_verified_at"=>now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
