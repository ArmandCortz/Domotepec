<?php
// database/migrations/[timestamp]_create_bienes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBienesTable extends Migration
{
    public function up()
    {
        Schema::create('bienes', function (Blueprint $table) {
            $table->id();
            $table->string('imagen')->nullable();
            $table->string('nombre');
            $table->float('costo', 8, 2); // Puedes ajustar la precisión y escala según tus necesidades
            $table->Integer('empresa');
            $table->Integer('sucursal');
            $table->integer('estado');
            $table->integer('stock')->nullable();
            $table->text('descripcion');
            $table->timestamps();

            
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('bienes');
    }
}