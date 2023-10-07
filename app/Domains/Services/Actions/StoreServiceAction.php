<?php


namespace App\Domains\Services\Actions;


use App\Domains\Services\Requests\AdminServiceStoreRequest;
use App\Domains\Services\Service\AdminServiceService;
use Illuminate\Support\Facades\DB;

class StoreServiceAction
{
    public function __construct(public AdminServiceService $adminServiceService)
    {}

    public function execute(AdminServiceStoreRequest $request)
    {
        $data = $request->toDto();
        DB::transaction(function () use ($data, $request) {
            $service = $this->adminServiceService->create($data);
            foreach ($data->otherImages as $image) {
                $service->addMedia($image)->toMediaCollection("images");
            }
        });

    }
}
