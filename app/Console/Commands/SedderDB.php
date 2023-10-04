<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SedderDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sedderDB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creacion de los elementos basicos para la base de datos';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('db:seed', ['--class' => 'CreateEstadoCivilSeeder']);
       $this->call('db:seed', ['--class' => 'CreatePersonaSeeder']);
        $this->call('db:seed', ['--class' => 'CreateUserSeeder']);
    }
}
