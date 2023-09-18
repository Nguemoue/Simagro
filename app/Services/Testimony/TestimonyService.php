<?php


namespace App\Services\Testimony;


use App\Models\Temoignage;

class TestimonyService
{
    public function create(string $contenu,int $clientId): Temoignage
    {
        return Temoignage::create([
            'contenu'=>$contenu,
            "client_id"=>$clientId
        ]);
    }
}
