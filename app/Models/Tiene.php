<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiene extends Model
{
    protected $table = 'tiene';

    protected $fillable = [
        'denunciante_id',
        'denunciado_id',
        'violencia_id',
        'fechaDenuncia',
    ];

    // Relación con la tabla PERSONA (denunciante)
    public function denunciante()
    {
        return $this->belongsTo(Persona::class, 'denunciante_id');
    }

    // Relación con la tabla PERSONA (denunciado)
    public function denunciado()
    {
        return $this->belongsTo(Persona::class, 'denunciado_id');
    }

    // Relación con la tabla DENUNCIAVIOLENCIA
    public function denunciaViolencia()
    {
        return $this->belongsTo(DenunciaViolencia::class, 'violencia_id');
    }
}
