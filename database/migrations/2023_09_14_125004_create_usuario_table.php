<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->unsignedBigInteger('rol');
            $table->timestamps();

            $table->foreign('rol')->references('id')->on('rol');
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
