<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalTable extends Migration
{
    public function up()
    {
        Schema::create('sucursal', function (Blueprint $table) {
            $table->id();
            $table->string('imagen')->nullable();
            $table->string('nombre', 100);
            $table->string('empresa', 100);
            $table->string('direccion', 100);
            $table->string('telefono', 100);
            $table->string('gerente', 100);



            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sucursal');
    }
}