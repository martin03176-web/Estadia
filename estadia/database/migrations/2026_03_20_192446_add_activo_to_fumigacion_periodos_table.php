<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Verificar si la columna activo ya existe antes de agregarla
        if (!Schema::hasColumn('fumigacion_periodos', 'activo')) {
            Schema::table('fumigacion_periodos', function (Blueprint $table) {
                $table->boolean('activo')->default(true)->after('descripcion');
            });
        }
        
        // Verificar si la columna fecha_inicio ya existe
        if (!Schema::hasColumn('fumigacion_periodos', 'fecha_inicio')) {
            Schema::table('fumigacion_periodos', function (Blueprint $table) {
                $table->date('fecha_inicio')->nullable()->after('temporada');
            });
        }
        
        // Verificar si la columna fecha_fin ya existe
        if (!Schema::hasColumn('fumigacion_periodos', 'fecha_fin')) {
            Schema::table('fumigacion_periodos', function (Blueprint $table) {
                $table->date('fecha_fin')->nullable()->after('fecha_inicio');
            });
        }
        
        // Verificar si la columna descripcion ya existe
        if (!Schema::hasColumn('fumigacion_periodos', 'descripcion')) {
            Schema::table('fumigacion_periodos', function (Blueprint $table) {
                $table->text('descripcion')->nullable()->after('fecha_fin');
            });
        }
    }

    public function down(): void
    {
        Schema::table('fumigacion_periodos', function (Blueprint $table) {
            $table->dropColumn(['activo', 'fecha_inicio', 'fecha_fin', 'descripcion']);
        });
    }
};