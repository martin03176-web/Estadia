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
        Schema::create('incidentes', function (Blueprint $table) {
            $table->id();

            $table->text('asunto');
            $table->date('fecha');
            $table->foreignId('areas_id')->constrained('areas')->onDelete('cascade');
            $table->foreignId('responsable_id')->constrained('responsables')->onDelete('cascade');
            $table->foreignId('tipo_incidente_id')->constrained('tipo_incidentes')->onDelete('cascade');
            $table->foreignId('tipo_riesgo_id')->constrained('tipo_riesgos')->onDelete('cascade');
            $table->text('decripcion');
            $table->foreignId('nivel_riesgo_id')->constrained('nivel_riesgos')->onDelete('cascade');
            $table->text('acciones_correctivas');
            $table->foreignId('material_equipo_id')->constrained('material_equipos')->onDelete('cascade');
            $table->string('tiempo_total', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidentes');
    }
};
