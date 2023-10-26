<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Persona;
use Carbon\Carbon;

class CreatePersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $personas = [
            [
                'id' => 159357,
                'nombre'=>'usuario 1',
                'apPat' => 'mamani',
                'apMat' => 'zurco',
                'fechaNac'=>Carbon::parse('2000-06-15'),
                'sexo' => 'femenino',
                'celular' => 7896512,
                'email' => 'eljudionaci234@gmail.com',
                'idEstado' => 1,
            ],
            [
                'id' => 951357,
                'nombre'=>'usuario 2',
                'apPat' => 'mamani',
                'apMat' => 'zurco',
                'fechaNac'=>Carbon::parse('2000-06-15'),
                'sexo' => 'femenino',
                'celular' => 7896522,
                'email' => 'editor@cambotutorial.com',
                'idEstado' => 3,
            ],
            [
                'id' => 654852,
                'nombre'=>'usuario 3',
                'apPat' => 'mamani',
                'apMat' => 'zurco',
                'fechaNac'=>Carbon::parse('2000-06-15'),
                'sexo' => 'femenino',
                'celular' => 7896552,
                'email' => 'admin@cambotutorial.com',
                'idEstado' => 2,
            ],

        ];

        foreach ($personas as $key => $persona)
        {
            Persona::create($persona);
        }
    }
}
