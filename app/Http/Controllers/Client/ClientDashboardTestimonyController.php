<?php

namespace App\Http\Controllers\Client;

use App\Constant\ReturnStatus;
use App\Data\Temoignage\UpdateTemoignageData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\TestimonyDeleteRequest;
use App\Http\Requests\Client\TestimonyStoreRequest;
use App\Http\Requests\Client\UpdateTestimonyRequest;
use App\Models\Temoignage;
use App\Services\Testimony\TestimonyService;


class ClientDashboardTestimonyController extends Controller
{
    public function __construct(public TestimonyService $testimonyService)
    {}

    public function index()
    {
        $temoignages = clientUser()->testimonies;
        return view("client.testimonies.index")->with([
            "temoignages"=>$temoignages
        ]);
    }

    public function store(TestimonyStoreRequest $request)
    {
        $this->testimonyService->create($request->input("contenu"),clientAuth()->id());
        return back()->with(ReturnStatus::SUCCESS,responseTextAfterCreate('temoignage'));
    }


    public function edit(Temoignage $testimony)
    {
        return view("client.testimonies.edit_testimony")->with([
            "temoignage"=>$testimony
        ]);
    }

    public function update(UpdateTestimonyRequest $request, Temoignage $testimony)
    {
        $data = UpdateTemoignageData::from($request);
        $this->testimonyService->update($data,$testimony->id);
        return back()->with(ReturnStatus::SUCCESS,responseTextAfterUpdate("temoignage"));
    }

    public function destroy(TestimonyDeleteRequest $request,Temoignage $testimony)
    {
        $this->testimonyService->delete($testimony);
        return back()->with(ReturnStatus::SUCCESS,responseTextAfterDelete("temoignage"));
    }
}
