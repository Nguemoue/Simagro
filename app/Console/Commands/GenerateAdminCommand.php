<?php

namespace App\Console\Commands;

use App\Models\Administrateur;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class GenerateAdminCommand extends Command
{
    protected $signature = 'generate:admin';

    protected function getArguments(): array
    {
        return [
            ["name",InputArgument::OPTIONAL,"the name of lucas",null]
        ];
    }

    protected $description = 'Génère un administrateur du site';

    public function handle()
    {
        $name = $this->argument("name")??"luc";
        $this->alert(
            $name,
            json_encode($this->arguments())
        );

    }

    protected function getOptions()
    {
        return [
            ['name', null, InputOption::VALUE_OPTIONAL, 'The class name of the root seeder', 'des'],
            ['age', null, InputOption::VALUE_OPTIONAL, 'The database connection to seed'],

        ];
    }
}
