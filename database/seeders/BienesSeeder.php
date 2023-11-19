<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bien;
class BienesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bien::create([
            'nombre' => 'papas fritas',
            'costo' => '1.25',
            'empresa' => '1',
            'sucursal' => '1',
            'estado' => '1',
            'stock' => '100',
            'descripcion' => 'Ricas papas fritas a la francesa',
        ]);
        
        Bien::create([
            'nombre' => 'Papas twister',
            'costo' => '1.25',
            'empresa' => '1',
            'sucursal' => '1',
            'estado' => '1',
            'stock' => '100',
            'descripcion' => 'Ricas papas twister',
        ]);
    }
}