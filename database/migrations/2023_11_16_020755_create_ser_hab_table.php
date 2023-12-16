<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerHabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ser_hab', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bien')->nullable();
            $table->unsignedBigInteger('servicio')->nullable();
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('cabana');
            $table->unsignedBigInteger('cliente');
            $table->unsignedBigInteger('reserva');
            $table->timestamps();

            $table->foreign('bien')->references('id')->on('bienes');
            $table->foreign('servicio')->references('id')->on('servicios');
            $table->foreign('cabana')->references('id')->on('cabanas');
            $table->foreign('cliente')->references('id')->on('cliente');
            $table->foreign('reserva')->references('id')->on('reserva');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ser_hab');
    }
}