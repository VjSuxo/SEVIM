<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CreateEstadoCivilSeeder;
use Database\Seeders\CreatePersonaSeeder;
use Database\Seeders\CreateUserSeeder;
use Database\Seeders\CreateTipoDenunciaSeeder;
use Database\Seeders\CreateTipoViolenciaSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CreateEstadoCivilSeeder::run();
        CreatePersonaSeeder::run();
        CreateUserSeeder::run();
        CreateTipoDenunciaSeeder::run();
        CreateTipoViolenciaSeeder::run();
    }
}
