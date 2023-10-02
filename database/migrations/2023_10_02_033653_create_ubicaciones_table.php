<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionesTable extends Migration
{
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id();
            $table->float('latitud');
            $table->float('longitud');
            $table->string('direccion');
            $table->string('tipo');

            // Claves foráneas para las relaciones
            $table->unsignedBigInteger('idPersona')->nullable();
            $table->unsignedBigInteger('idRefugio')->nullable();
            $table->unsignedBigInteger('idEvento')->nullable();

            $table->foreign('idPersona')->references('id')->on('personas');
            $table->foreign('idRefugio')->references('id')->on('refugios');
            $table->foreign('idEvento')->references('id')->on('eventos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ubicaciones');
    }
}

