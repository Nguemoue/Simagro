<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Publication extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $casts = [
        "date_publication" => "datetime"
    ];
    protected $guarded = [];
    public function domainePublication(): BelongsTo
    {
        return $this->belongsTo(DomainePublication::class);
    }

}
