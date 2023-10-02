<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Persona extends Model
{
    protected $table = 'personas';

    protected $fillable = [
        'nombre',
        'apPat',
        'apMat',
        'fechaNac',
        'sexo',
        'celular',
        'email',
        'idEstado',
    ];

    public function estadoCivil()
    {
        return $this->belongsTo(EstadosCivil::class, 'idEstado');
    }
}
