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
            $table->integer('edad'); 
            $table->string('semestre', 10)->nullable();
            $table->dateTime('fecha_atencion');
            $table->decimal('frecuencia_cardiaca', 8, 2); 
            $table->decimal('frecuencia_respiratoria', 8, 2);
            $table->decimal('tension_sistolica', 8, 2)->nullable();
            $table->decimal('tension_diastolica', 8, 2)->nullable();
            $table->decimal('temperatura', 8, 2);
            $table->decimal('oxigenacion', 8, 2);
            $table->decimal('glucemia', 8, 2);
            $table->text('signos_sintomas'); 
            $table->text('alergias');
            $table->text('medicamento');
            $table->text('patologia');
            $table->text('ultimo_alimento');
            $table->text('eventos_previos');
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
