<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refugio extends Model
{
    protected $table = 'refugios';

    protected $fillable = [
        'nombre',
        'tipo',
    ];

    public function ubicaciones()
    {
        return $this->hasMany(Ubicacion::class, 'idRefugio');
    }
}
