<?php


namespace App\Data\Temoignage;


use Spatie\LaravelData\Data;

class UpdateTemoignageData extends Data
{
    public function __construct(
        public string $contenu
    )
    {}
}
