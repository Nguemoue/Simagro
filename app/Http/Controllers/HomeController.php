<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Temoignage;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $temoignages = Temoignage::with("client")->take(4)->get();
        return view("welcome")->with([
            "services" => $services,
            "temoignages" => $temoignages
        ]);
    }
}
