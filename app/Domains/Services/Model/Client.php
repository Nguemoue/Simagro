<?php

namespace App\Domains\Services\Model;

use App\Models\Temoignage;
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

    public function canJoinRoom($roomId): bool
    {
        return$roomId ==  2 ;
    }
}
