<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apPat');
            $table->string('apMat');
            $table->date('fechaNac');
            $table->string('sexo');
            $table->bigInteger('celular');
            $table->string('email');

            // Clave foránea para la relación con estados_civiles
            $table->unsignedBigInteger('idEstado');
            $table->foreign('idEstado')->references('id')->on('estados_civiles');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
}

