<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DenunciaViolencia extends Model
{
    protected $table = 'denunciaviolencia';

    protected $fillable = [
        'fechaHechoDenuncia',
        'relato',
        'urlArchivoPruebas',
        'tipo_violencia_id',
        'tipo_denuncia_id',
        'direccion_id',
    ];

    public function tipoViolencia()
    {
        return $this->belongsTo(TipoViolencia::class, 'tipo_violencia_id');
    }

    public function tipoDenuncia()
    {
        return $this->belongsTo(TipoDenuncia::class, 'tipo_denuncia_id');
    }
    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'direccion_id'); // Nombre del modelo y la columna de la clave foránea
    }
}
