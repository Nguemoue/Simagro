<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticate;
class Administrateur extends Authenticate
{
    use HasFactory;

    function guardName(){
        return config("app.guard_admin");
    }
    public function getFullNameAttribute(): string
    {
        return $this->nom . ' ' .$this->prenom;
    }

}
