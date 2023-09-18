<?php

namespace App\Http\Controllers\Admin;

use App\Constant\ReturnStatus;
use App\Data\Publication\StorePublicationData;
use App\Http\Controllers\Controller;
use App\Models\DomainePublication;
use App\Models\Publication;
use App\Services\Publication\PublicationService;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::with("domainePublication")->get();
        $domainesPublications = DomainePublication::query()->get();
        return view("admin.publications.index")->with([
            "publications" => $publications,
            "domainesPublications"=>$domainesPublications
        ]);
    }

    public function store(StorePublicationData $storePublicationData,PublicationService $service)
    {
        $publication = $service->store($storePublicationData);
        //je renvoie vers la page d'ajout des resources
        return redirect()->route("admin.publications.resources.create",['publication'=>$publication->id]);
    }

    public function show(Publication $publication)
    {
    }

    public function edit(Publication $publication)
    {
    }

    public function update(Request $request, Publication $publication)
    {
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return back()->with(ReturnStatus::SUCCESS,responseTextAfterDelete('publication'));
    }
}
