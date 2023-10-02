<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'fechaIni',
        'fechaFin',
        'urlImg',
        'urlSecion',
        'resumen',
        'tipo',
    ];

    public function ubicaciones()
    {
        return $this->hasMany(Ubicacion::class, 'idEvento');
    }
}
