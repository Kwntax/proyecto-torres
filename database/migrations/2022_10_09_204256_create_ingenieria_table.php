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
        Schema::create('ingenieria', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('ingenieria');
    }
};
