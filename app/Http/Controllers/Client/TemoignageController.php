<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Temoignage;
use App\Response\Client\Temoignages\TemoignageEditResponse;

class TemoignageController extends Controller
{
    public function __invoke()
    {
        $temoignages = Temoignage::paginate(10);
        return new TemoignageEditResponse($temoignages);
    }
}
