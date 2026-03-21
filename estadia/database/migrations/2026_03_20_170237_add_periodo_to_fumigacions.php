<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fumigacion_periodos', function (Blueprint $table) {
            $table->id();
            $table->year('anio');
            $table->enum('temporada', ['primavera', 'verano', 'otoño', 'invierno']);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->text('descripcion')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
            
            // Asegurar que no se repita el mismo año y temporada
            $table->unique(['anio', 'temporada']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fumigacion_periodos');
    }
};