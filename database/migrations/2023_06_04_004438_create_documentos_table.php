<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('asunto');
            $table->string('archivo');
            $table->string('folio');
            $table->integer('ntramite');
            $table->datetime('fingreso');
            $table->datetime('fechadoc');
            $table->longText('observacion');
            $table->string('respuesta');
            $table->enum("estado", ["Pendiente", "Aceptado", "Finalizado"])->nullable()->default('Pendiente');
            $table->foreignId('oficina_id')->constrained('oficinas')->onDelete('cascade');
            $table->foreignId('tipo_documento_id')->constrained('tipo_documentos')->onDelete('cascade');
            $table->foreignId('remitente_id')->constrained('remitentes')->onDelete('cascade');
            $table->foreignId('indicacion_id')->constrained('indicacions')->onDelete('cascade');
            $table->foreignId('procedimiento_id')->constrained('procedimientos')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('derivar_documento_id')->nullable()->constrained('derivar_documentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
