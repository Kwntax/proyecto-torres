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
        Schema::create('lugarDeNacimiento', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad');
            $table->foreignId('id_entidadFederativa')->nullable()->constrained('entidadFederativa')->cascadeOnUpdate()->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugarDeNacimiento');
    }
};
