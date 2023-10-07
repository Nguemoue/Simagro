<?php


namespace App\Services\Testimony;


use App\Data\Temoignage\UpdateTemoignageData;
use App\Models\Temoignage;

class TestimonyService
{
    public function create(array $contenu,int $clientId): Temoignage
    {
        return Temoignage::create([
            'contenu'=>$contenu,
            "client_id"=>$clientId
        ]);
    }
    public function update(UpdateTemoignageData $data,int $temoignageId):Temoignage{
        $temoignage =  Temoignage::find($temoignageId)->fill($data->toArray());
        $temoignage->save();
        return  $temoignage;
    }

    public function delete(Temoignage $testimony)
    {
        $testimony = $testimony->delete();
    }
}
