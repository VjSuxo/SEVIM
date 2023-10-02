<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicacion';

    protected $fillable = [
        'enlace',
        'nombre',
        'contenido',
        'urlImagen',
    ];

    // No se requieren relaciones para esta tabla en este ejemplo
}
