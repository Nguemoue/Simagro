<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticate implements MustVerifyEmail
{
    use HasFactory,Notifiable;
    protected $guarded = [];

}
