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
           
            $columns = Schema::getColumnListing('fumigacions');
            
            if(!in_array('hora', $columns)) {
                $table->string('hora', 100)
                    ->after('fecha');
            }
            if (!in_array('tipo', $columns)) {
                $table->enum('tipo', ['programada', 'extemporanea'])
                      ->default('programada')
                      ->after('hora');
            }
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fumigacions', function (Blueprint $table) {
            $table->dropColumn(['tipo', 'hora']);
        });
    }
};