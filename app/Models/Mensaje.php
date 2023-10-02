<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';

    protected $fillable = [
        'mensaje',
        'fecha',
        'remitente_id',
        'destinatario_id',
    ];

    public function remitente()
    {
        return $this->belongsTo(Usuario::class, 'remitente_id');
    }

    public function destinatario()
    {
        return $this->belongsTo(Usuario::class, 'destinatario_id');
    }
}
