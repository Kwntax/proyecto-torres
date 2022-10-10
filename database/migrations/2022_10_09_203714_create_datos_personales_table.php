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
        Schema::create('datosPersonales', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('fechaDeNacimiento');
            $table->integer('edad');
            $table->string('lugarDeNacimiento');
            $table->string('ciudad');
            
            $table->foreign('lugarDeNacimiento', 'fk_id_lugarDeNacimiento_alumno')->references('id')->on('lugarDeNacimiento');
            $table->foreign('genero', 'fk_genero_alumno')->references('id')->on('genero');
            $table->foreign('estadoCivil', 'fk_estadoCivil_alumno')->references('id')->on('estadoCivil');
            $table->foreign('domicilio', 'fk_domicilio_alumno')->references('id')->on('domicilio');
            $table->foreign('contacto', 'fk_contacto_alumno')->references('id')->on('contacto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datosPersonales');
    }
};
