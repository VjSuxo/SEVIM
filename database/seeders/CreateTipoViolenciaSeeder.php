<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoViolencia;

class CreateTipoViolenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        TipoViolencia::create([
            'tipoviolencia' => 'Violencia física',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia Feminicida',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia Psicologíca',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia mediática',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia Simbólica y/o encubierta',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia contra la dignidad, la honra y el nombre',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia sexual',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia contra los derechos reproductivos',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia en servicio de salud',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia patrimonial y económica',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia laboral',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia en el sistema educativo plurinacional',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia en el ejercicio político y de liderazgo de la mujer',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia institucional',
        ]);

        TipoViolencia::create([
            'tipoviolencia' => 'Violencia contra los derechos y la libertad sexual',
        ]);
    }
}
