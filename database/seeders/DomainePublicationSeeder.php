<?php

namespace Database\Seeders;

use App\Models\DomainePublication;
use Illuminate\Database\Seeder;

class DomainePublicationSeeder extends Seeder
{
    public function run()
    {
        DomainePublication::query()->delete();
        //je cree mes publication
        $domainesPublications = config('site.domaines_publications');
        foreach ($domainesPublications as $publication){
            DomainePublication::create([
                'libelle'=>$publication,
                'description'=>''
            ]);
        }
    }
}
