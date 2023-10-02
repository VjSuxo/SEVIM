<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoViolenciaTable extends Migration
{
    public function up()
    {
        Schema::create('tipoviolencia', function (Blueprint $table) {
            $table->id();
            $table->string('tipoViolencia')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipoviolencia');
    }
}

