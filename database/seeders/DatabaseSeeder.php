<?php

namespace Database\Seeders;

use App\Models\Administrateur;
use App\Models\DomainePublication;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Client::factory(20)->create();
        //configuration de l'administrateur par defaut
        Administrateur::factory(1)->create([
            'email'=>"admin@gmail.com",
            'password' => bcrypt("password")
        ]);
        $this->call(ParametreSeeder::class);
        $this->call(DomainePublicationSeeder::class);
    }
}
