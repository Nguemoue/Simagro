<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parametre;
use Illuminate\Support\Facades\Artisan;

class ParametreController extends Controller
{
    public function index()
    {
        $parametres = Parametre::query()->get();
        if($parametres->isEmpty()){
            Artisan::call("db:seed",['class'=>"ParametreSeeder"]);
            $parametres = Parametre::query()->get();
        }
        return view("admin.parametres.index",[
            'parametres'=>$parametres
        ]);
    }
}
