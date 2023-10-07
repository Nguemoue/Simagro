<?php


namespace App\Domains\Services\Service;


use App\Domains\Services\Data\ServiceData;
use App\Models\Service;

class AdminServiceService
{
    public function create(ServiceData $data): Service
    {
        return Service::query()->create([
            "libelle"=>$data->libelle,
            "description"=>$data->description,
            "but"=>$data->but,
            "administrateur_id"=>auth('admin')->id(),
            "image"=>$data->image->store(getStoragePathFor('services'))
        ]);
    }
}
