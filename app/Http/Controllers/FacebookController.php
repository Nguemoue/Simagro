<?php

namespace App\Http\Controllers;

use Socialite;

class FacebookController extends Controller
{
    public function index()
    {
        return Socialite::driver('facebook')->redirect();
    }
}
