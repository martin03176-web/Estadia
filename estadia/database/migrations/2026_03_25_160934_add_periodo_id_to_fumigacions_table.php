<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('fumigacions', function (Blueprint $table) {
            $table->foreignId('periodo_id')->nullable()->constrained('fumigacion_periodos')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('fumigacions', function (Blueprint $table) {
            $table->dropForeign(['periodo_id']);
            $table->dropColumn('periodo_id');
        });
    }
};
