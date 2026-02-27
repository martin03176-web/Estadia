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
        Schema::create('atencions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->string('edad', 10);
            $table->string('semestre', 10)->nullable();//nullable para que no sea obligatori;
            $table->string('hora_atencion', 10);
            $table->string('frecuencia_cardiaca', 100);
            $table->string('frecuencia_respiratoria', 100);
            $table->string('tension_sistolica', 100)->nullable();//nullable para que no sea obligatori;
            $table->string('tension_diastolica', 100)->nullable();//nullable para que no sea obligatori;
            $table->string('temperatura', 100);
            $table->string('oxigenacion', 100);
            $table->string('glucemia', 100);
            $table->string('signos_sintomas', 100);
            $table->string('alergias', 100);
            $table->string('medicamento', 100);
            $table->string('patologia', 100);
            $table->string('ultimo_alimento', 100);
            $table->string('eventos_previos', 100);
            $table->string('destino', 100);             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atencions');
    }
};
