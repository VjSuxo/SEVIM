<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id',
        'departamento',
        'domicilio',
        'ubicacion',
    ];

    // Si deseas agregar relaciones con otros modelos, puedes hacerlo aquí

    // Ejemplo de relación con la tabla DenunciaViolencia (uno a muchos)
    public function denunciasViolencia()
    {
        return $this->hasMany(DenunciaViolencia::class, 'direccion_id');
    }
}
