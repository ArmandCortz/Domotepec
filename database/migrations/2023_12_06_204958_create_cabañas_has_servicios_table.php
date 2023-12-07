<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabañasHasServiciosTable extends Migration
{
    
    public function up()
    {
        Schema::create('cabañas_has_servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabaña');
            $table->unsignedBigInteger('servicio');


            $table->foreign('cabaña')->references('id')->on('cabañas');
            $table->foreign('servicio')->references('id')->on('servicios');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cabañas_has_servicios');

    }
}