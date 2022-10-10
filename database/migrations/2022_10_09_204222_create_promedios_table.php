<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promedios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tsu')->nullable()->constrained('tsu')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_ingenieria')->nullable()->constrained('ingenieria')->cascadeOnUpdate()->nullOnDelete();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promedios');
    }
};
