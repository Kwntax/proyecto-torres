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
        Schema::create('tsu', function (Blueprint $table) {
            $table->id();
            $table->float('bachillerato', 10, 2);
            $table->string('nivelIngles');
            $table->integer('puntosExamenIngreso');
            $table->foreignId('id_porCuatrimestre')->nullable()->constrained('porCuatrimestre')->cascadeOnUpdate()->nullOnDelete();
            $table->float('promedio', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tsu');
    }
};
