<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bienes;
class BienesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bienes::create([
            'nombre' => 'papas fritas',
            'costo' => '1.25',
            'descripcion' => 'Ricas papas fritas a la francesa',
            'sucursal' => '1',
            'empresa' => '1',
            'stock' => '100',
        ]);
        
        Bienes::create([
            'nombre' => 'papas twister',
            'costo' => '1.50',
            'descripcion' => 'Ricas papas twister',
            'sucursal' => '2',
            'empresa' => '1',
            'stock' => '100',
        ]);
    }
}