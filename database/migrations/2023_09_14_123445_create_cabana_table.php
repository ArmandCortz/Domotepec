<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabanaTable extends Migration
{
    public function up()
    {
        Schema::create('cabana', function (Blueprint $table) {
            $table->id();
            $table->string('imagen')->nullable();
            $table->string('nombre', 100);
            $table->string('ubicacion', 100);
            $table->string('descripcion', 200);
            $table->integer('sucursal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabana');
    }
}