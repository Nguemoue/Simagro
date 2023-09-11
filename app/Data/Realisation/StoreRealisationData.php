<?php

namespace App\Data\Realisation;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StoreRealisationData extends Data
{
    public function __construct(
        public string $titre,
        public string $contenu,
        public string $lieu,
        public string $date_realisation,
        public string $realisateur,
        public int $nombre_jour,
        public UploadedFile $photo,
        public array $ressources
    ) {}
}
