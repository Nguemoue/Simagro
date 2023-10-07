<?php


namespace App\Response\Client\Temoignages;


use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Collection;
use function view;

class TemoignageEditResponse implements Responsable
{
    public function __construct(public $temoignages)
    {}

    public function toResponse($request)
    {
        return view("client.testimonies")->with([
            "temoignages"=>$this->temoignages
        ]);
    }
}
