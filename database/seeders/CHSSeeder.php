<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CHS;

class CHSSeeder extends Seeder
{
    public function run()
    {
        
        CHS::create([
            'cabaña' => '1',
            'servicio' => '2',
        ]);
        CHS::create([
            'cabaña' => '1',
            'servicio' => '1',
        ]);
        CHS::create([
            'cabaña' => '2',
            'servicio' => '2',
        ]);
        CHS::create([
            'cabaña' => '2',
            'servicio' => '1',
        ]);
        CHS::create([
            'cabaña' => '3',
            'servicio' => '2',
        ]);
        CHS::create([
            'cabaña' => '3',
            'servicio' => '1',
        ]);
    }
}