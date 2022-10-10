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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('matricula');
            $table->string('nombreCompleto', 250);
            $table->string('foto', 255);
            $table->string('datosPersonales', 6);
            $table->string('datosFamiliares', 6);
            $table->string('datosLaborales', 6);
            $table->string('datosEconomicos', 6);
            $table->string('datosEscolares', 6);
            $table->decimal('promedios', 6);


            $table->foreign('datosPersonales', 'fk_datosPersonales_alumno')->references('id')->on('datosPersonales');
            $table->foreign('datosFamiliares', 'fk_datosFamiliares_alumno')->references('id')->on('datosFamiliares');
            $table->foreign('datosLaborales', 'fk_datosLaborales_alumno')->references('id')->on('datosLaborales');
            $table->foreign('datosEconomicos', 'fk_datosEconomicos_alumno')->references('id')->on('datosEconomicos');
            $table->foreign('datosEscolares', 'fk_datosEscolares_alumno')->references('id')->on('datosEscolares');
            $table->foreign('promedios', 'fk_promedios_alumno')->references('id')->on('promedios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};
