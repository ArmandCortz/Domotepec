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
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
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