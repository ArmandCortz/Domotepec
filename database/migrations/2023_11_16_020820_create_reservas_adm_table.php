<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasAdmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas_adm', function (Blueprint $table) {
            $table->id();
            $table->string('id_cliente');
            $table->string('id_empresa');
            $table->string('id_sucursal');
            $table->string('id_cabaña');
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');
            $table->integer('n_personas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas_adm');
    }
}