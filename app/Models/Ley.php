<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ley extends Model
{
    protected $table = 'ley';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
    ];

    // No se requieren relaciones para esta tabla en este ejemplo
}
