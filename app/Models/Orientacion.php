<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orientacion extends Model
{
    protected $table = 'orientacion';

    protected $fillable = [
        'nombre',
        'resumen',
        'relleno',
        'urlFondo',
    ];

    // No se requieren relaciones para esta tabla en este ejemplo
}

