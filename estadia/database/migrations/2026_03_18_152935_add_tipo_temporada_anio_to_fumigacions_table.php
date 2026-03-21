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
        Schema::table('fumigacions', function (Blueprint $table) {
            // Primero verificar qué columnas existen
            $columns = Schema::getColumnListing('fumigacions');
            
            // Si existe 'fecha' pero no 'fecha_hora', la creamos
            if (in_array('fecha', $columns) && !in_array('fecha_hora', $columns)) {
                // Crear nueva columna DATETIME
                $table->dateTime('fecha_hora')->nullable()->after('responsable_titular_id');
            }
            
            // Agregar nuevos campos si no existen
            if (!in_array('tipo', $columns)) {
                $table->enum('tipo', ['programada', 'extemporanea'])
                      ->default('programada')
                      ->after('fecha_hora');
            }
            
            if (!in_array('temporada', $columns)) {
                $table->enum('temporada', ['primavera', 'verano', 'otoño', 'invierno'])
                      ->nullable()
                      ->after('tipo');
            }
            
            if (!in_array('anio', $columns)) {
                $table->integer('anio')
                      ->nullable()
                      ->after('temporada');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fumigacions', function (Blueprint $table) {
            $table->dropColumn(['fecha_hora', 'tipo', 'temporada', 'anio']);
        });
    }
};