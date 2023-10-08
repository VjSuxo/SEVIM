<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nosotros extends Model
{
    protected $table = 'nosotros';

    protected $fillable = [
        'id',
        'titulo',
        'resumen',
        'urlImagen',
        'tipo',
        'texto',
        'urlFondo',
    ];

    // No se requieren relaciones para esta tabla en este ejemplo
}
