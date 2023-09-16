<?php

namespace Database\Seeders;

use App\Models\Parametre;
use Illuminate\Database\Seeder;

class ParametreSeeder extends Seeder
{
    public function run()
    {
        Parametre::query()->delete();
        //je cree de nouveau parametre
        $parametres = config('site.parametres');
        if ($parametres == []){
            throw new \InvalidArgumentException("le fichier de configuration est invalide");
        }
        foreach ($parametres as $parametre){
            Parametre::query()->create([
                'nom'=>$parametre['title'],
                'value'=>$parametre['value'],
                'description'=>$parametre['description']
            ]);
        }

    }
}
