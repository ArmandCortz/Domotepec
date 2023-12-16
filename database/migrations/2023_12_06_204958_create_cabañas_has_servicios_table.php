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
            $table->unsignedBigInteger('cabana');
            $table->unsignedBigInteger('servicio');


            $table->foreign('cabana')->references('id')->on('cabanas');
            $table->foreign('servicio')->references('id')->on('servicios');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabañas_has_servicios');

    }
}