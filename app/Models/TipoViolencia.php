<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoViolencia extends Model
{
    protected $table = 'tipoviolencia';

    protected $fillable = ['tipoViolencia'];

    public function denuncias()
    {
        return $this->hasMany(DenunciaViolencia::class, 'tipo_violencia_id');
    }
}
