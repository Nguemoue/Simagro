<?php

namespace App\Broadcasting;

use App\Domains\Services\Model\Client;

class TestChannel
{
    public function __construct()
    {
    }

    public function join(Client $client)
    {
        return $client->email == "lucchuala@gmail.com";
    }
}
