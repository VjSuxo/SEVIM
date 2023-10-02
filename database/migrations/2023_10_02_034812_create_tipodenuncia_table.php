<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoDenunciaTable extends Migration
{
    public function up()
    {
        Schema::create('tipodenuncia', function (Blueprint $table) {
            $table->id();
            $table->string('tipoDenuncia')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipodenuncia');
    }
}

