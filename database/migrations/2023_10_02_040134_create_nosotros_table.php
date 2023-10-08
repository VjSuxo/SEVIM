<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNosotrosTable extends Migration
{
    public function up()
    {
        Schema::create('nosotros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->text('resumen')->nullable();
            $table->string('urlImagen')->nullable();
            $table->string('tipo')->nullable();
            $table->text('texto')->nullable();
            $table->string('urlFondo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nosotros');
    }
}
