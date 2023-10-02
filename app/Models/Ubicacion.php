<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicaciones';

    protected $fillable = [
        'latitud',
        'longitud',
        'direccion',
        'tipo',
        'idPersona',
        'idRefugio',
        'idEvento',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'idPersona');
    }

    public function refugio()
    {
        return $this->belongsTo(Refugio::class, 'idRefugio');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'idEvento');
    }
}
