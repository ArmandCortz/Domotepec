<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabañaTable extends Migration
{
    public function up()
    {
        Schema::create('cabañas', function (Blueprint $table) {
            $table->id();
            $table->string('imagen')->nullable();
            $table->string('nombre', 100);
            $table->string('ubicacion', 100);
            $table->text('descripcion');
            $table->integer('sucursal');
            $table->float('precio', 8, 2)->nullable(); 
            $table->integer('huespedes')->nullable();
            $table->integer('habitaciones')->nullable();
            $table->integer('camas')->nullable();
            $table->integer('baños')->nullable();
            $table->float('limpieza', 8, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabaña');
    }
}