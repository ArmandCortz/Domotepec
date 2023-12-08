    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateReservaTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('reserva', function (Blueprint $table) {
                $table->id();
                $table->string('cliente', 100);
                $table->string('email');
                $table->bigInteger('telefono');
                $table->unsignedBigInteger('cabaña');
                $table->date('ingreso');
                $table->date('egreso');
                $table->float('costo', 8, 2);
                $table->unsignedBigInteger('huespedes');
                $table->unsignedBigInteger('estado');

                $table->timestamps();

                // $table->foreign('cliente')->references('id')->on('cliente');
                $table->foreign('cabaña')->references('id')->on('cabañas');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('reserva');
        }
    }