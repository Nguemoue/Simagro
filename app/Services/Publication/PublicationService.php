<?php


namespace App\Services\Publication;


use App\Data\Publication\StorePublicationData;
use App\Models\Publication;

class PublicationService
{
    public function store(StorePublicationData $data): Publication
    {
        return Publication::create([
            "titre"=>$data->titre,
            "contenu"=>$data->contenu,
            "administrateur_id"=>adminUser()->id,
            "date_publication"=>now(),
            "domaine_publication_id"=>$data->domaine_publication_id,
            "statut"=>1
        ]);
    }
}
