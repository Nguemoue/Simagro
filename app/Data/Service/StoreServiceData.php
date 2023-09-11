<?php

namespace App\Data\Service;


use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\File;
use Spatie\LaravelData\Attributes\Validation\Image;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StoreServiceData extends Data
{
    public function __construct(
        #[MapInputName("titre")]
      public string $libelle,
        public string $but,
        public string $description,
        #[Image]
        public UploadedFile $image,
        #[MapInputName('other_images')]
        public array $otherImages
    ) {}
}
