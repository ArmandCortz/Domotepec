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
            'costo' => '500',
            'empresa' => '1',
            'sucursal' => '1',
            'estado' => '1',
            'stock' => '1',
            'descripcion' => 'Cayac en el lago',

        ]);
        Servicios::create([

            'nombre' => 'Lancha',
            'costo' => '700',
            'empresa' => '1',
            'sucursal' => '2',
            'estado' => '2',
            'stock' => '1',
            'descripcion' => 'Lancha en altamar',

        ]);
    }
}