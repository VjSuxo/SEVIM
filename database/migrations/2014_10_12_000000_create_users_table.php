<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Campo autoincremental para el ID
            $table->string('nombreusuario')->unique();
            //0 = User, 1 = Editor, 2 = Admin
            $table->string('email')->unique();
            $table->tinyInteger('role')->default(0);
            $table->string('password');
            $table->string('nombre');
            $table->string('apePaterno');
            $table->string('apeMaterno');
            $table->string('genero');
            $table->date('fechaNac');
            $table->enum('estCivil', ['soltero', 'casado', 'divorciado', 'viudo']);
            $table->string('numeroCel');
            $table->string('ciudad');
            $table->string('calle');
            $table->string('zona');
            $table->string('numeroCasa');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
