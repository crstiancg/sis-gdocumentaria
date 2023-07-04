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
        Schema::create('mesa_ayudas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('asunto');
            $table->string('archivo');
            $table->string('folio');
            $table->datetime('fingreso')->nullable();
            $table->enum("estado", ["Revision","Aceptado", "No Aceptado"])->nullable()->default('Revision');
            $table->foreignId('remitente_id')->constrained('remitentes')->onDelete('cascade');
            $table->foreignId('tipo_documento_id')->constrained('tipo_documentos')->onDelete('cascade');
            $table->foreignId('oficina_id')->constrained('oficinas')->onDelete('cascade');
            $table->foreignId('procedimiento_id')->constrained('procedimientos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesa_ayudas');
    }
};
