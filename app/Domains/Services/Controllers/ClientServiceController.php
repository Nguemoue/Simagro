<?php

namespace App\Domains\Services\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use function view;

class ClientServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view("client.services.index")->with([
            'services'=>$services
        ]);
    }
    public function show(Service $service){
        return view("client.services.show_service")->with([
            "service"=>$service
        ]);
    }
}
