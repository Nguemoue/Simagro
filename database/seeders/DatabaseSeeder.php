<?php

namespace Database\Seeders;

use App\Models\Administrateur;
use App\Models\Client;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Client::factory(20)->create();
        Administrateur::factory(20)->create();
    }
}
