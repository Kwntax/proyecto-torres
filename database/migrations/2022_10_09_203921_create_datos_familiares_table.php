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
        Schema::create('datosFamiliares', function (Blueprint $table) {
            $table->id();
            table->unsignedBigInteger('id_padre')->nullable();
            $table->foreign('id_padre')->references('id')->on('padre')->onDelete('set null');
            table->unsignedBigInteger('id_madre')->nullable();
            $table->foreign('id_madre')->references('id')->on('madre')->onDelete('set null');
            table->unsignedBigInteger('id_conyuge')->nullable();
            $table->foreign('id_conyuge')->references('id')->on('conyuge')->onDelete('set null');
            table->unsignedBigInteger('id_emergencia')->nullable();
            $table->foreign('id_emergencia')->references('id')->on('emergencia')->onDelete('set null');


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datosFamiliares');
    }
};
