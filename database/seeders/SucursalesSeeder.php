<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sucursal;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sucursal::create([

            'nombre' => 'Ilopango',
            'empresa' => 'Domotepec',
            'direccion' => 'Ilopango',
            'telefono' => '50360043157',
            'gerente' => 'Leonel',

        ]);

        Sucursal::create([

            'nombre' => 'La Libertad',
            'empresa' => 'Domotepec',
            'direccion' => 'La Libertad',
            'telefono' => '50360043157',
            'gerente' => 'Leonel',

        ]);
    }
}