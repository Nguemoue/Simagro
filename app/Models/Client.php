<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticate implements MustVerifyEmail
{
    use HasFactory,Notifiable;
    protected $guarded = [];

    public function testimonies(): HasMany
    {
        return $this->hasMany(Temoignage::class);
    }
}
