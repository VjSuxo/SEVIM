<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionTable extends Migration
{
    public function up()
    {
        Schema::create('publicacion', function (Blueprint $table) {
            $table->id();
            $table->string('enlace')->nullable();
            $table->string('nombre')->nullable();;
            $table->text('contenido')->nullable();;
            $table->string('urlImagen')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('publicacion');
    }
}
