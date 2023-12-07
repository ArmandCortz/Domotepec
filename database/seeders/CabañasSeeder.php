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

            'imagen' => '1699542885.jpeg',
            'nombre' => 'Las Tres Flores',
            'ubicacion' => 'Ilopango',
            'descripcion' => 'cabaña orilla del lago',
            'sucursal' => '1',
            'precio' => '90',
            'huespedes' => '10',
            'habitaciones' => '4',
            'camas' => '8',
            'baños' => '3',
            'limpieza' => '15',

        ]);

        Cabaña::create([
            'imagen'=>'1700870006.png',
            'nombre' => 'La Bocana',
            'ubicacion' => 'La Libertad',
            'descripcion' => 'cabaña orilla de playa',
            'sucursal' => '2',
            'precio' => '90',
            'huespedes'=>'10',
            'habitaciones'=>'4',
            'camas'=>'8',
            'baños'=>'3',
            'limpieza'=>'15',
        ]);

        Cabaña::create([
            'imagen' => '1700869727.png',
            'nombre' => 'Los Amates',
            'ubicacion' => 'La Libertad',
            'descripcion' => 'cabaña orilla los amates',
            'sucursal' => '2',
            'precio' => '100',
            'huespedes' => '15',
            'habitaciones' => '6',
            'camas' => '10',
            'baños' => '4',
            'limpieza' => '30',
        ]);
    }
}