<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciaViolenciaTable extends Migration
{
    public function up()
    {
        Schema::create('denunciaviolencia', function (Blueprint $table) {
            $table->id();
            $table->date('fechaHechoDenuncia')->nullable();
            $table->text('relato')->nullable();
            $table->string('urlArchivoPruebas')->nullable();
            $table->unsignedBigInteger('tipo_violencia_id')->nullable(); // Clave foránea para TIPOVIOLENCIA
            $table->unsignedBigInteger('tipo_denuncia_id')->nullable(); // Clave foránea para TIPODENUNCIA
            $table->foreign('tipo_violencia_id')->references('id')->on('tipoviolencia');
            $table->foreign('tipo_denuncia_id')->references('id')->on('tipodenuncia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('denunciaviolencia');
    }
}

