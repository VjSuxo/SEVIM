<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrientacionTable extends Migration
{
    public function up()
    {
        Schema::create('orientacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('resumen');
            $table->text('relleno');
            $table->string('urlFondo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orientacion');
    }
}

