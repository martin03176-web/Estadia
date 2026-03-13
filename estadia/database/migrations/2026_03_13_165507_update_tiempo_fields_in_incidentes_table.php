<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('incidentes', function (Blueprint $table) {

            // eliminar campo anterior
            $table->dropColumn('tiempo_total');

            // nuevos campos
            $table->time('hora_inicio')->after('descripcion');
            $table->time('hora_fin')->after('hora_inicio');
        });
    }

    public function down(): void
    {
        Schema::table('incidentes', function (Blueprint $table) {

            $table->integer('tiempo_total_atencion')->nullable();

            $table->dropColumn(['hora_inicio','hora_fin']);
        });
    }

};