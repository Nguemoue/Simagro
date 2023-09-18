<?php

namespace App\Http\Controllers\Client;

use App\Constant\ReturnStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\TestimonyStoreRequest;
use App\Http\Requests\Client\UpdateTestimonyRequest;
use App\Models\Temoignage;
use App\Services\Testimony\TestimonyService;


class ClientTestimonyController extends Controller
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

    public function create()
    {
    }

    public function store(TestimonyStoreRequest $request)
    {
        $this->testimonyService->create($request->input("contenu"),clientAuth()->id());
        return back()->with(ReturnStatus::SUCCESS,responseTextAfterCreate('temoignage'));
    }

    public function show(Temoignage $testimony)
    {
    }

    public function edit(Temoignage $testimony)
    {
        return view("client.testimonies.edit_testimony")->with([
            "temoignage"=>$testimony
        ]);
    }

    public function update(UpdateTestimonyRequest $request, Temoignage $testimony)
    {
        $testimony->contenu = $request->input("contenu");
        return back()->with(ReturnStatus::SUCCESS,responseTextAfterUpdate("temoignage"));
    }

    public function destroy(Temoignage $testimony)
    {
        $testimony->delete();
        return back()->with(ReturnStatus::SUCCESS,responseTextAfterDelete("temoignage"));
    }
}
