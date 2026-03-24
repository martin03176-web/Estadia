<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fumigacion_periodos', function (Blueprint $table) {
            // Verificar y agregar columnas faltantes
            if (!Schema::hasColumn('fumigacion_periodos', 'fecha_inicio')) {
                $table->date('fecha_inicio')->nullable()->after('temporada');
            }
            
            if (!Schema::hasColumn('fumigacion_periodos', 'fecha_fin')) {
                $table->date('fecha_fin')->nullable()->after('fecha_inicio');
            }
            
            if (!Schema::hasColumn('fumigacion_periodos', 'descripcion')) {
                $table->text('descripcion')->nullable()->after('fecha_fin');
            }
            
            if (!Schema::hasColumn('fumigacion_periodos', 'activo')) {
                $table->boolean('activo')->default(true)->after('descripcion');
            }
        });
    }

    public function down(): void
    {
        Schema::table('fumigacion_periodos', function (Blueprint $table) {
            $table->dropColumn(['fecha_inicio', 'fecha_fin', 'descripcion', 'activo']);
        });
    }
};