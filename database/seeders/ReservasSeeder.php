<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reserva::create([
            'cliente'=> 'Leonel Armando Garcia Cortez',
            'email' => 'armand1515.lc@gmail.com',
            'telefono' => '50398760231',
            'cabaña' => '1',
            'ingreso' => '2023-12-11',
            'egreso' => '2023-12-12',
            'costo' => '90',
            'huespedes' => '2',
            'estado' => '1',
        ]);

        Reserva::create([
            'cliente' => 'Javier Enrique Moran Lopez',
            'email' => 'Javilop.lc@gmail.com',
            'telefono' => '50398760231',
            'cabaña' => '2',
            'ingreso' => '2023-12-11',
            'egreso' => '2023-12-12',
            'costo' => '180',
            'huespedes' => '3',
            'estado' => '2',
        ]);

        Reserva::create([
            'cliente' => 'Victor Daniel Andres Diaz',
            'email' => 'VictorDiaz@gmail.com',
            'telefono' => '50398760231',
            'cabaña' => '3',
            'ingreso' => '2023-12-11',
            'egreso' => '2023-12-12',
            'costo' => '100',
            'huespedes' => '5',
            'estado' => '3',
        ]);

        Reserva::create([
            'cliente' => 'Leonel Armando Garcia Cortez',
            'email' => 'armand1515.lc@gmail.com',
            'telefono' => '50398760231',
            'cabaña' => '1',
            'ingreso' => '2023-12-11',
            'egreso' => '2023-12-12',
            'costo' => '90',
            'huespedes' => '2',
            'estado' => '4',
        ]);

        Reserva::create([
            'cliente' => 'Javier Enrique Moran Lopez',
            'email' => 'Javilop.lc@gmail.com',
            'telefono' => '50398760231',
            'cabaña' => '2',
            'ingreso' => '2023-12-11',
            'egreso' => '2023-12-12',
            'costo' => '180',
            'huespedes' => '3',
            'estado' => '5',
        ]);

        Reserva::create([
            'cliente' => 'Victor Daniel Andres Diaz',
            'email' => 'VictorDiaz@gmail.com',
            'telefono' => '50398760231',
            'cabaña' => '3',
            'ingreso' => '2023-12-11',
            'egreso' => '2023-12-12',
            'costo' => '100',
            'huespedes' => '5',
            'estado' => '6',
        ]);
        

        // Reserva::create([
        //     'cliente' => 'Leonel Armando Garcia Cortez',
        //     'email' => 'armand1515.lc@gmail.com',
        //     'telefono' => '50398760231',
        //     'cabaña' => '1',
        //     'ingreso' => '2023-12-15',
        //     'egreso' => '2023-12-16',
        //     'costo' => '90',
        //     'huespedes' => '2',
        //     'estado' => '4',
        // ]);

        // Reserva::create([
        //     'cliente' => 'Javier Enrique Moran Lopez',
        //     'email' => 'Javilop.lc@gmail.com',
        //     'telefono' => '50398760231',
        //     'cabaña' => '2',
        //     'ingreso' => '2023-12-21',
        //     'egreso' => '2023-12-23',
        //     'costo' => '180',
        //     'huespedes' => '3',
        //     'estado' => '3',
        // ]);

        // Reserva::create([
        //     'cliente' => 'Victor Daniel Andres Diaz',
        //     'email' => 'VictorDiaz@gmail.com',
        //     'telefono' => '50398760231',
        //     'cabaña' => '3',
        //     'ingreso' => '2023-12-31',
        //     'egreso' => '2024-1-1',
        //     'costo' => '100',
        //     'huespedes' => '5',
        //     'estado' => '1',
        // ]);
    }
}