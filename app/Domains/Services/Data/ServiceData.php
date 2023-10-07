<?php

namespace App\Domains\Services\Data;


use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\Image;
use Spatie\LaravelData\Data;

class ServiceData extends Data
{
    /**
     * StoreServiceData constructor.
     * @param string $libelle
     * @param string $but
     * @param string $description
     * @param UploadedFile $image
     * @param array<UploadedFile> $otherImages
     */
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
