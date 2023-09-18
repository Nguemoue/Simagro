<?php

namespace App\Http\Controllers\Admin;

use App\Constant\ReturnStatus;
use App\Data\Realisation\StoreRealisationData;
use App\Http\Controllers\Controller;
use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\MimeType;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;

class RealisationController extends Controller
{
    public function index()
    {
        $realisations = Realisation::query()->get();
        return view("admin.realisations.index",[
            "realisations"=>$realisations
        ]);
    }

    public function create()
    {
        return view("admin.realisations.create");

    }


    public function store(Request $request)
    {
        $data = StoreRealisationData::from($request);
        //je cree mon realisation
        \DB::transaction(function () use ($data,$request){
            $realisation = Realisation::query()->create([
                "titre"=>$data->titre,
                "contenu"=>$data->contenu,
                "lieu"=>$data->lieu,
                "realisateur"=>$data->realisateur,
                "date_realisation"=>$data->date_realisation,
                "nombre_jour"=>$data->nombre_jour,
                "photo"=>$request->file("photo")->store(getStoragePathFor('realisations')),
            ]);
            foreach ($data->ressources as $ressource){
                $realisation->addMedia($ressource)->toMediaCollection("ressources");
            }
        });

        //je stocke les autres images
        return redirect()->back()->with(ReturnStatus::SUCCESS,"realisation cree");
    }

    public function show(Realisation $realisation)
    {
        return view("admin.realisations.show",[
            "realisation"=>$realisation
        ]);
    }

    public function edit(Realisation $realisation)
    {
        return view("admin.realisations.edit",[
            "realisation"=>$realisation
        ]);
    }

    public function update(Request $request, Realisation $realisation)
    {
        //je valide mes donnees
        if($request->hasFile("ressources")){
            try {
                $realisation->deleteMedia("ressources");
            } catch (MediaCannotBeDeleted $e) {
                return back()->withErrors($e->getMessage());
            }
            foreach ($request->file("ressources") as $ressource){
                try {
                    $realisation->addMedia($ressource)->toMediaCollection("ressources");
                } catch (FileDoesNotExist | FileIsTooBig $e) {
                    return back()->withErrors($e->getMessage());
                }
            }
        }
        if($request->hasFile("photo")){
            \Storage::delete($realisation->photo);
            $realisation->photo = $request->file("photo")->store(getStoragePathFor("realisations"));
        }
        $realisation->contenu = $request->input("contenu");
        $realisation->lieu = $request->input("lieu");
        $realisation->nombre_jour = $request->input("nombre_jour");
        $realisation->date_realisation = $request->input("date_realisation");
        $realisation->realisateur = $request->input("realisateur");
        $realisation->titre = $request->input("titre");
        $realisation->save();
        return redirect()->back()->with(ReturnStatus::SUCCESS,"realisation mis a jour");
    }

    public function destroy(Realisation $realisation)
    {
        $realisation->delete();
        return redirect()->back()->with(ReturnStatus::SUCCESS,responseTextAfterDelete("realisations"));
    }
}
