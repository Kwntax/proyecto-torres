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
        Schema::create('contacto', function (Blueprint $table) {
            $table->id();
            table->unsignedBigInteger('id_correoElectronico')->nullable();
            $table->foreign('id_correoElectronico')->references('id')->on('correoElectronico')->onDelete('set null');
            table->unsignedBigInteger('id_telefono')->nullable();
            $table->foreign('id_telefono')->references('id')->on('telefono')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacto');
    }
};
