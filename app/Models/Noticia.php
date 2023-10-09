<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = 'noticia';

    protected $fillable = [
        'id',
        'tipo',
        'enlace',
    ];

    // No se requieren relaciones para esta tabla en este ejemplo
}
