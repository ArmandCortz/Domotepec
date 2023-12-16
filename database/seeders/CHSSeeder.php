<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CHS;

class CHSSeeder extends Seeder
{
    public function run()
    {

        CHS::create([
            'cabana' => '1',
            'servicio' => '2',
        ]);
        CHS::create([
            'cabana' => '1',
            'servicio' => '1',
        ]);
        CHS::create([
            'cabana' => '2',
            'servicio' => '2',
        ]);
        CHS::create([
            'cabana' => '2',
            'servicio' => '1',
        ]);
        CHS::create([
            'cabana' => '3',
            'servicio' => '2',
        ]);
        CHS::create([
            'cabana' => '3',
            'servicio' => '1',
        ]);
    }
}