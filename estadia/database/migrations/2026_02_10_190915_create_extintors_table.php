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
        Schema::create('extintors', function (Blueprint $table) {
            $table->id();

            $table->foreignId('clave_id')->constrained('claves')->onDelete('cascade');
            $table->string('numeracion', 50);
            $table->date('fecha_adquisicion', 100);
            $table->foreignId('area_id')->constrained('areas')->onDelete('cascade');
            $table->foreignId('tipo_id')->constrained('tipos')->onDelete('cascade');
            $table->string('peso', 100);
            $table->string('ubicacion', 100);
            $table->string('lugar_referencia', 100);
            $table->text('observaciones');
            $table->string('condicion_extintor', 100);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extintors');
    }
};
