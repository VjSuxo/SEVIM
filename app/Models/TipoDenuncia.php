<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDenuncia extends Model
{
    protected $table = 'tipodenuncia';

    protected $fillable = ['tipoDenuncia'];

    public function denuncias()
    {
        return $this->hasMany(DenunciaViolencia::class, 'tipo_denuncia_id');
    }
}
