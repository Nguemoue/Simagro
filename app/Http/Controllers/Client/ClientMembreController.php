<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Membre;

class ClientMembreController extends Controller
{
    public function index()
    {
        $membres = Membre::all();
        return view("client.membres.list_membres")->with([
            'membres'=>$membres
        ]);
    }

    public function show(Membre $membre){
        return view("client.membres.show_membre")->with([
            'membre'=>$membre
        ]);
    }
}
