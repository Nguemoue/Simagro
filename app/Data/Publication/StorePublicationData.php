<?php

namespace App\Data\Publication;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

class StorePublicationData extends Data
{
    public function __construct(
        public string $contenu,
        public string $titre,
        #[MapInputName("domaine")]
        public int $domaine_publication_id
    )
    {
    }
}
