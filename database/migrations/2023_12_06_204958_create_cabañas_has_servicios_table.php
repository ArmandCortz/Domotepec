<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabañasHasServiciosTable extends Migration
{

    public function up()
    {
        Schema::create('cabanas_has_servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabana');
            $table->unsignedBigInteger('servicio');


            $table->foreign('cabana')->references('id')->on('cabanas')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('servicio')->references('id')->on('servicios')->onDelete('NO ACTION')->onUpdate('NO ACTION');

        });
    }

    public function down()
    {
        Schema::dropIfExists('cabanas_has_servicios');

    }
}