<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cabaña;

class CabañasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cabaña::create([

            'nombre' => 'Las Tres Flores',
            'ubicacion' => 'Ilopango',
            'sucursal' => '1',
            'descripcion' => 'cabaña orilla del lago',

        ]);

        Cabaña::create([

            'nombre' => 'La Bocana',
            'ubicacion' => 'La Libertad',
            'sucursal' => '2',
            'descripcion' => 'cabaña orilla de playa',

        ]);
    }
}