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
        Schema::create('patin_tpa', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('presion', 10,4);
            $table->float('flujo', 10,5);
            $table->float('temperatura', 10,2);
            $table->float('densidad', 10,4);
            $table->float('densidadCorr', 10,4);
            $table->float('grossiv', 15,5);
            $table->float('netgsv', 15,5);
            $table->float('fqi', 15,1);
            $table->timestamp('creado');    
            $table->timestamp('actualizado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patin_tpa');
    }
};
