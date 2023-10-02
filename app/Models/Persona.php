<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    protected $fillable = [
        'id',
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
