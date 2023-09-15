<?php

namespace App\Console\Commands;

use App\Models\Administrateur;
use Illuminate\Console\Command;

class GenerateAdminCommand extends Command
{
    protected $signature = 'generate:admin';

    protected $description = 'Génère un administrateur du site';

    public function handle()
    {
//       $administrateur =  Administrateur::factory(1)->create();
        $reponse = $this->ask("voulez vous terminez : ");
        $this->alert($reponse);
    }
}
