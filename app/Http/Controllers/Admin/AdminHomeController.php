<?php

namespace App\Http\Controllers\Admin;

use App\Domains\Services\Model\Client;
use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Models\Rdv;
use App\Models\Realisation;
use App\Models\Service;

class AdminHomeController extends Controller
{
    public function index()
    {
        $realisationCount = Realisation::count();
        $publicationCount = Publication::count();
        $rendezVousCount = Rdv::count();
        $serviceCount = Service::count();
        $clientCount = Client::count();
        return view("admin.home",[
            'serviceCount' => $serviceCount,
            'realisationCount'=>$realisationCount,
            'publicationCount'=>$publicationCount,
            'rendezVousCount'=>$rendezVousCount,
            'clientCount' => $clientCount
        ]);
    }
}
