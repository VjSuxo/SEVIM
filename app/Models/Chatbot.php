<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chatbot extends Model
{
    protected $table = 'chatbot';

    protected $fillable = [
        'pregunta',
        'respuesta',
    ];

    // No se requieren relaciones para esta tabla en este ejemplo
}
