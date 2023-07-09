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
        Schema::create('remitentes', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 8);
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('correo');
            $table->string('razonsocial')->nullable();
            $table->integer('celular');
            $table->foreignId('tipo_persona_id')->constrained('tipo_personas')->onDelete('cascade');
            $table->string('full_name')->virtualAs('concat(nombre, \' \', paterno, \' \', materno)');

            // $table->foreignId('departamento_id')->constrained('departamentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remitentes');
    }
};
