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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre', 100);
            $table->integer('edad');
            $table->string('sexo', 20);
            $table->integer('telefono', 15)->nullable();
            $table->integer('codigo')->unique();
            $table->string('carrera_area', 100);
            $table->string('semestre', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
