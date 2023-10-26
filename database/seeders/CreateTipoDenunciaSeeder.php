<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoDenuncia;
class CreateTipoDenunciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        TipoDenuncia::create([
            'tipodenuncia' => 'anonimo',
        ]);

        TipoDenuncia::create([
            'tipodenuncia' => 'publico',
        ]);


    }
}
