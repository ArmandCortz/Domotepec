<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriasTable extends Migration
{
    public function up()
    {
        Schema::create('galerias', function (Blueprint $table) {
            $table->id();
            $table->string('empresa',100);
            $table->string('sucursal',100 );
            $table->text('descripcion');
            $table->text('ubicacion');
            $table->string('imagen'); // Agregar la columna de imagen
            // Agregar otros campos según tus necesidades

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('galerias');
    }
}

