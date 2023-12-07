<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('imagen')->nullable();
            $table->string('nombre', 100);
            $table->decimal('costo', 13, 2);
            $table->Integer('empresa');
            $table->integer('sucursal');
            $table->integer('estado');
            $table->integer('stock')->nullable();
            $table->string('descripcion', 200);
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('servicio');
    }
}