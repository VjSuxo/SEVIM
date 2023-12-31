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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('codigo')->nullable();
            $table->string('verificado')->default('false');
            $table->integer('intentos_fallidos')->default(0);
            $table->integer('bloqueo')->default(0);
            $table->string('email')->unique();
            //0 = User, 1 = Editor, 2 = Admin
            $table->tinyInteger('role')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('persona_id')->unique();
            $table->foreign('persona_id')->references('id')->on('personas');
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
