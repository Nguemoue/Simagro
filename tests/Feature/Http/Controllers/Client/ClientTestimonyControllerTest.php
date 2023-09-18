<?php

namespace Http\Controllers\Client;

use App\Models\Client;
use App\Models\Temoignage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTestimonyControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testIndex()
    {
        $this->refreshApplicationWithLocale("en");
        $temoignage = Temoignage::factory()->create();

    }
}
