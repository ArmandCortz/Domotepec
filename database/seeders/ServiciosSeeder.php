<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicios;
class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicios::create([

            'nombre' => 'Cayac',
            'sucursal' => '1',
            'descripcion' => 'Cayac en el lago',
            'costo' => '500',
            'estado' => '1',

        ]);
        Servicios::create([

            'nombre' => 'Lancha',
            'sucursal' => '2',
            'descripcion' => 'Lancha en altamar',
            'costo' => '700',
            'estado' => '2',

        ]);
    }
}