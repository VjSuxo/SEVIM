<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeyTable extends Migration
{
    public function up()
    {
        Schema::create('ley', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();;
            $table->text('descripcion')->nullable();;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ley');
    }
}
