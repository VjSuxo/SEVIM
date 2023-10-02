<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estados_civiles'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'tipo',
    ];

    public function personas()
    {
        return $this->hasMany(Persona::class, 'idEstado');
    }
}

