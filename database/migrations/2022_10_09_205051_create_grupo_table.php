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
        Schema::create('grupo', function (Blueprint $table) {
            $table->string('id', 25)->primary();
            $table->tinyInteger('cuatrimestre');
            $table->string('grupo');
            $table->string('descripcion', 100);
            $table->string('carrera', 6);
            $table->string('especialidad', 6);
            $table->integer('periodo');
            
            $table->foreign('carrera', 'fk_carrera_grupo')->references('id')->on('carrera');
            $table->foreign('especialidad', 'fk_especialidad_grupo')->references('id')->on('especialidad');
            $table->foreign('periodo', 'fk_periodo_grupo')->references('id')->on('periodo');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo');
    }
};
