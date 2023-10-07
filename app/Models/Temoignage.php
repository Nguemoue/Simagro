<?php

namespace App\Models;

use App\Domains\Services\Model\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Temoignage extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
