<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBienTable extends Migration
{
    public function up()
    {
        Schema::create('bien', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->integer('estado');
            $table->float('costo');
            $table->string('descripcion', 200);
            $table->integer('sucursal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bien');
    }
}
