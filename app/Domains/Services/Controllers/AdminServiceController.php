<?php

namespace App\Domains\Services\Controllers;

use App\Constant\ReturnStatus;
use App\Domains\Services\Actions\StoreServiceAction;
use App\Domains\Services\Requests\AdminServiceStoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;
use Storage;
use function back;
use function getStoragePathFor;
use function redirect;
use function responseTextAfterDelete;
use function view;

class AdminServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::query()->get();
        return view("admin.services.index",[
            "services"=>$services
        ]);
    }

    /**
     * page de creation d'un service en mode administrateur
     * @return View
     */
    public function create(): View
    {
        return view("admin.services.create");
    }

    /**
     * stocke le service en base de données
     * @param AdminServiceStoreRequest $request
     * @param StoreServiceAction $storeServiceAction
     * @return RedirectResponse
     */
    public function store(AdminServiceStoreRequest $request,StoreServiceAction $storeServiceAction): RedirectResponse
    {
        $storeServiceAction->execute($request);
        return back()->with(ReturnStatus::SUCCESS,"service cree");
    }

    /**
     * renvoie la page administrateur pour voir un service
     * @param Service $service
     * @return View
     */
    public function show(Service $service): View
    {
        return view("admin.services.show",[
            "service"=>$service
        ]);
    }

    public function edit(Service $service): View
    {
        return view("admin.services.edit",[
            "service"=>$service
        ]);
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
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
            Storage::delete($service->image);
            $service->image = $request->file("image")->store(getStoragePathFor("services"));
        }
        $service->libelle = $request->input("titre");
        $service->but = $request->input("but");
        $service->description = $request->input("description");
        $service->save();
        return redirect()->back()->with(ReturnStatus::SUCCESS,"service mis a jour");

    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();
        return back()->with(ReturnStatus::SUCCESS,responseTextAfterDelete("services"));

    }
}
