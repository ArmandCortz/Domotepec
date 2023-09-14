<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServHabTable extends Migration
{
    public function up()
    {
        Schema::create('serv_hab', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bien')->nullable();
            $table->unsignedBigInteger('servicio')->nullable();
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('cabaña');
            $table->unsignedBigInteger('cliente');
            $table->unsignedBigInteger('reserva');
            $table->timestamps();

            $table->foreign('bien')->references('id')->on('bien');
            $table->foreign('servicio')->references('id')->on('servicio');
            $table->foreign('cabaña')->references('id')->on('cabaña');
            $table->foreign('cliente')->references('id')->on('cliente');
            $table->foreign('reserva')->references('id')->on('reserva');
        });
    }

    public function down()
    {
        Schema::dropIfExists('serv_hab');
    }
}

