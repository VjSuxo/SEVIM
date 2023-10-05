<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTieneTable extends Migration
{
    public function up()
    {
        Schema::create('tiene', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('denunciante_id')->nullable(); // Clave foránea para denunciante (PERSONA)
            $table->unsignedBigInteger('denunciado_id')->nullable(); // Clave foránea para denunciado (PERSONA)
            $table->unsignedBigInteger('violencia_id')->nullable(); // Clave foránea para denuncia de violencia (DENUNCIAVIOLENCIA)
            $table->date('fechaDenuncia');

            $table->timestamps();

            // Restricciones de clave foránea
            $table->foreign('denunciante_id')->references('id')->on('personas');
            $table->foreign('denunciado_id')->references('id')->on('personas');
            $table->foreign('violencia_id')->references('id')->on('denunciaviolencia');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tiene');
    }
}

