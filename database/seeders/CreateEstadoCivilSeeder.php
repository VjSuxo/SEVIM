<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstadoCivil;

class CreateEstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $estados = [
            [
               'tipo'=>'Esposo/a',
            ],
            [
               'tipo'=>'Ex Pareja Conviviente',
            ],
            [
               'tipo'=>'Padre/Madre',
            ],
            [
                'tipo'=>'Ex Esposo',
            ],
            [
                'tipo'=>'Novio/a',
            ],
            [
                'tipo'=>'Hijo/a',
            ],
            [
                'tipo'=>'Pareja Conviviente',
            ],
            [
                'tipo'=>'Ex Novio',
            ],
            [
                'tipo'=>'Hermano/a',
            ],
        ];

        foreach ($estados as $key => $estado)
        {
            EstadoCivil::create($estado);
        }
    }
}
