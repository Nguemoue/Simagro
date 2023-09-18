<?php

namespace App\Http\Controllers\Admin;

use App\Constant\ReturnStatus;
use App\Data\Service\StoreServiceData;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()->get();
        return view("admin.services.index",[
            "services"=>$services
        ]);
    }

    public function create()
    {
        return view("admin.services.create");
    }

    public function store(Request $request)
    {
        $data = StoreServiceData::from($request);

        //je cree mon service
        \DB::transaction(function () use ($data,$request){
            $service = Service::query()->create([
                "libelle"=>$data->libelle,
                "description"=>$data->description,
                "but"=>$data->but,
                "administrateur_id"=>auth('admin')->id(),
                "image"=>$request->file("image")->store(getStoragePathFor('services'))
            ]);
            foreach ($data->otherImages as $image){
                $service->addMedia($image)->toMediaCollection("images");
            }

        });

        //je stocke les autres images
        return redirect()->back()->with(ReturnStatus::SUCCESS,"service cree");
    }

    public function show(Service $service)
    {
        return view("admin.services.show",[
            "service"=>$service
        ]);
    }

    public function edit(Service $service)
    {
        return view("admin.services.edit",[
            "service"=>$service
        ]);
    }

    public function update(Request $request, Service $service)
    {
        //je valide mes donnees
        if($request->hasFile("other_images")){
            try {
                $service->deleteMedia("images");
            } catch (MediaCannotBeDeleted $e) {
                return back()->withErrors($e->getMessage());
            }
            foreach ($request->file("other_images") as $image){
                try {
                    $service->addMedia($image)->toMediaCollection("images");
                } catch (FileDoesNotExist | FileIsTooBig $e) {
                    return back()->withErrors($e->getMessage());
                }
            }
        }
        if($request->hasFile("image")){
            \Storage::delete($service->image);
            $service->image = $request->file("image")->store(getStoragePathFor("services"));
        }
        $service->libelle = $request->input("titre");
        $service->but = $request->input("but");
        $service->description = $request->input("description");
        $service->save();
        return redirect()->back()->with(ReturnStatus::SUCCESS,"service mis a jour");

    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with(ReturnStatus::SUCCESS,responseTextAfterDelete("services"));

    }
}
