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
        Schema::create('datosEconomicos', function (Blueprint $table) {
            $table->id();
            table->unsignedBigInteger('id_viveCon')->nullable();
            $table->foreign('id_viveCon')->references('id')->on('viveCon')->onDelete('set null');
            table->unsignedBigInteger('id_vivienda')->nullable();
            $table->foreign('id_vivienda')->references('id')->on('vivienda')->onDelete('set null');
            table->unsignedBigInteger('id_transporte')->nullable();
            $table->foreign('id_transporte')->references('id')->on('transporte')->onDelete('set null');
            table->unsignedBigInteger('id_apoyoEconomico')->nullable();
            $table->foreign('id_apoyoEconomico')->references('id')->on('apoyoEconomico')->onDelete('set null');
            table->unsignedBigInteger('id_ingresosFamiliares')->nullable();
            $table->foreign('id_ingresosFamiliares')->references('id')->on('ingresosFamiliares')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datosEconomicos');
    }
};
