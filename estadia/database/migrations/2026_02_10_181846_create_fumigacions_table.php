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
        Schema::create('fumigacions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('responsble_servicio_id')->constrained('responsables')->onDelete('cascade');
            $table->foreignId('area_id')->constrained('areas')->onDelete('cascade');
            $table->foreignId('responsable_titular_id')->constrained('responsables')->onDelete('cascade');
            $table->date('fecha');
            $table->foreignId('motivo_id')->constrained('motivos')->onDelete('cascade');
            $table->foreignId('responsable_contingencia_id')->constrained('responsables')->onDelete('cascade');
            $table->foreignId('equipo_fumigacion_id')->constrained('equipo_fumigacions')->onDelete('cascade');
            $table->foreignId('responsable_fumigacion_id')->constrained('responsables')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fumigacions');
    }
};
