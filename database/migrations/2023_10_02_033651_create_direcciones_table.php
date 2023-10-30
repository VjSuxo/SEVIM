<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id(); // Autoincremental primary key
            $table->string('departamento');
            $table->string('domicilio');
            $table->string('ubicacion');
            $table->timestamps(); // Campos de registro de tiempo (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
